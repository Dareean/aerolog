@props(['title' => null])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'AeroLog' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans bg-white text-[#171717]">
    <div class="min-h-screen">
        <nav class="h-16 bg-white border-b border-[#f0f0f3] flex items-center px-6">
            <div class="max-w-6xl w-full mx-auto flex items-center justify-between">
                <div class="text-lg font-semibold">AeroLog</div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium text-[#171717]">Dashboard</a>
                    <a href="{{ route('flights.create') }}" class="text-sm font-medium text-[#0d74ce]">Log Flight</a>
                </div>
            </div>
        </nav>

        @if (isset($header))
            <header class="bg-white">
                <div class="max-w-6xl mx-auto px-6 py-6">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="max-w-6xl mx-auto px-6 py-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
