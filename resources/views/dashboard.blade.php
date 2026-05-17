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
