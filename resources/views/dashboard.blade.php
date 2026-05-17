<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Tampilan khusus Dispatcher --}}
            @can('is-dispatcher')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-4">
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">
                    👨‍✈️ Selamat Datang, Dispatcher!
                </h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Kamu bisa mengelola rute dan melihat semua log penerbangan.
                </p>
                <div class="mt-4 flex gap-3">
                    <a href="{{ route('routes.index') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Kelola Rute
                    </a>
                    <a href="{{ route('flight-logs.index') }}"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Lihat Semua Log
                    </a>
                </div>
            </div>
            @endcan

            {{-- Tampilan khusus Pilot --}}
            @can('is-pilot')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-4">
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">
                    ✈️ Selamat Datang, Pilot!
                </h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Kamu bisa mencatat dan melihat log penerbanganmu sendiri.
                </p>
                <div class="mt-4 flex gap-3">
                    <a href="{{ route('flight-logs.index') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Log Penerbangan Saya
                    </a>
                    <a href="{{ route('flight-logs.create') }}"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Tambah Log Baru
                    </a>
                </div>
            </div>
            @endcan

        </div>
    </div>
</x-app-layout>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flight Operations Dashboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans bg-white text-ink">

    <!-- Hero -->
    <header class="w-full bg-white" style="background-image: radial-gradient(circle at 50% 0%, rgba(207, 231, 255, 0.45) 0%, rgba(255, 255, 255, 0) 62%);">
        <div class="max-w-6xl mx-auto px-6 py-24">
            <h1 class="text-6xl font-semibold tracking-tight text-[#171717]">Flight Operations Log</h1>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 -mt-12">
        <!-- Overview Stats -->
        <section class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="rounded-xl border border-[#f0f0f3] bg-white p-6">
                <div class="text-sm text-[#60646c]">Total Flight Hours</div>
                <div class="mt-3 text-3xl font-mono text-[#171717]">142.5 hrs</div>
            </div>

            <div class="rounded-xl border border-[#f0f0f3] bg-white p-6">
                <div class="text-sm text-[#60646c]">Average Landing Rate</div>
                <div class="mt-3 text-3xl font-mono text-[#171717]">-180 fpm</div>
            </div>

            <div class="rounded-xl border border-[#f0f0f3] bg-white p-6">
                <div class="text-sm text-[#60646c]">Crew Status</div>
                <div class="mt-3">
                    <span class="inline-flex rounded-full bg-[#fff7dd] px-3 py-1 text-xs font-semibold tracking-wide text-[#ab6400]">
                        REST REQUIRED
                    </span>
                </div>
            </div>
        </section>

        <!-- Recent Flights + AI Panel -->
        <section class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2 rounded-xl border border-[#f0f0f3] bg-[#ffffff] p-6">
                <h3 class="mb-4 text-lg font-semibold text-[#171717]">Recent Flights</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#f0f0f3]">
                        <thead class="bg-[#ffffff]">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#60646c]">Date</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#60646c]">Route</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#60646c]">Altitude</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#60646c]">Landing Score</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#60646c]">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f5f5f7]">
                            <tr>
                                <td class="px-4 py-3 text-sm text-[#60646c]">2026-05-17</td>
                                <td class="px-4 py-3 text-sm font-mono text-[#171717]">WAAA - WIII</td>
                                <td class="px-4 py-3 text-sm font-mono text-[#171717]">35000 ft</td>
                                <td class="px-4 py-3 text-sm text-[#171717]">Butter Landing 🧈</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex rounded-full bg-[#ecfdf3] px-3 py-1 text-xs font-semibold uppercase tracking-wide text-[#16a34a]">Stable</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 text-sm text-[#60646c]">2026-05-16</td>
                                <td class="px-4 py-3 text-sm font-mono text-[#171717]">WIII - WADD</td>
                                <td class="px-4 py-3 text-sm font-mono text-[#171717]">37000 ft</td>
                                <td class="px-4 py-3 text-sm text-[#171717]">Hard Landing ⚠️</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex rounded-full bg-[#fff7dd] px-3 py-1 text-xs font-semibold uppercase tracking-wide text-[#ab6400]">Review</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <aside class="rounded-xl border border-[#cfe7ff] bg-[#ffffff] p-6">
                <h3 class="mb-3 text-lg font-semibold text-[#171717]">AI Eco-Route Analysis</h3>
                <p class="text-base font-normal leading-6 text-[#60646c]">
                    Penerbangan WAAA-WIII pada 35.000 ft kurang efisien. Pengurangan ketinggian ke 33.000 ft dapat menghemat 150 kg bahan bakar.
                </p>
            </aside>
        </section>
    </main>

</body>
</html>
