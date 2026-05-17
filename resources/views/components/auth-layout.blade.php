@props(['title'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'AeroLog' }}</title>
    <!-- Vite-managed assets -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans bg-white">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-6">
                <div class="text-2xl font-semibold text-black">AeroLog</div>
            </div>

            <div class="bg-white p-8 rounded-xl border border-gray-200">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
