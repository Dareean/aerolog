<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIBriefingController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'origin' => 'required|string',
            'destination' => 'required|string',
        ]);

        $origin = $request->origin;
        $destination = $request->destination;

        // Skip same origin and destination
        if ($origin === $destination) {
            return response()->json([
                'briefing' => 'Origin and destination cannot be the same. Please select a valid route.',
                'savings' => 0
            ]);
        }

        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            return response()->json([
                'briefing' => 'AI System offline. Please check API Key configuration in .env file.',
                'savings' => 0
            ], 500);
        }

        $prompt = "You are a senior aviation dispatcher AI for AeroLog Airlines. "
                . "A pilot is flying from $origin to $destination. "
                . "Provide a very concise, professional 2-sentence route and weather briefing. "
                . "Include simulated technical details like crosswinds, turbulence, or recommended flight levels (FL) referencing the airports. "
                . "Also simulate a fuel savings amount in kg (an integer between 50 and 400). "
                . "Output STRICTLY in JSON format with exactly two keys: \"briefing\" (string) and \"savings\" (integer). No markdown formatting, no code blocks.";

        try {
            $response = Http::withoutVerifying()->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'topK' => 40,
                    'topP' => 0.95,
                    'maxOutputTokens' => 1024,
                ]
            ]);

            if ($response->successful()) {
                $result = $response->json();
                $text = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';
                
                // Clean up potential markdown formatting like ```json ... ```
                $text = str_replace(['```json', '```'], '', $text);
                $data = json_decode(trim($text), true);

                if (isset($data['briefing']) && isset($data['savings'])) {
                    return response()->json([
                        'briefing' => $data['briefing'],
                        'savings' => $data['savings']
                    ]);
                } else {
                    \Illuminate\Support\Facades\Log::error('Gemini API JSON parsing failed. Text: ' . $text);
                }
            } else {
                \Illuminate\Support\Facades\Log::error('Gemini API Request failed. Status: ' . $response->status() . ' Body: ' . $response->body());
            }

            return response()->json([
                'briefing' => 'AI Briefing temporarily unavailable. Please refer to standard SOP.',
                'savings' => 0
            ], 500);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Gemini API Exception: ' . $e->getMessage());
            return response()->json([
                'briefing' => 'Connection to AI dispatch failed. Follow standard routing.',
                'savings' => 0
            ], 500);
        }
    }
}
