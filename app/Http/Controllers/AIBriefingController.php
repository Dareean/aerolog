<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIBriefingController extends Controller
{
    private function fallbackBriefing(string $origin, string $destination): array
    {
        $distanceHint = rand(60, 180);

        return [
            'briefing' => "Route {$origin} to {$destination} remains within standard dispatch tolerances. Expect stable enroute conditions with moderate crosswind variability and plan a conservative descent profile.",
            'savings' => $distanceHint,
        ];
    }

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

        $apiKey = config('services.gemini.key');
        if (!$apiKey) {
            return response()->json($this->fallbackBriefing($origin, $destination));
        }

        $prompt = "You are a senior aviation dispatcher AI for AeroLog Airlines. "
                . "A pilot is flying from $origin to $destination. "
                . "Provide a very concise, professional 2-sentence route and weather briefing. "
                . "Include simulated technical details like crosswinds, turbulence, or recommended flight levels (FL) referencing the airports. "
                . "Also simulate a fuel savings amount in kg (an integer between 50 and 400). "
                . "Output STRICTLY in JSON format with exactly two keys: \"briefing\" (string) and \"savings\" (integer). No markdown formatting, no code blocks.";

        try {
            $response = Http::timeout(20)
                ->acceptJson()
                ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}", [
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
                $trimmedText = trim($text);
                $data = json_decode($trimmedText, true);

                if (!is_array($data)) {
                    if (preg_match('/\{.*\}/s', $trimmedText, $matches)) {
                        $data = json_decode($matches[0], true);
                    }
                }

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

            return response()->json($this->fallbackBriefing($origin, $destination));

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Gemini API Exception: ' . $e->getMessage());
            return response()->json($this->fallbackBriefing($origin, $destination));
        }
    }
}
