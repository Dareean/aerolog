<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-[#171717]">
            Log New Flight
        </h2>
    </x-slot>

    <div class="bg-[#ffffff] py-10" data-reveal>
        <div class="mx-auto w-full max-w-5xl px-4 sm:px-6 lg:px-8">
            <form action="#" method="POST" class="rounded-xl border border-[#f0f0f3] bg-[#ffffff] p-6 shadow-sm md:p-8" data-reveal>
                @csrf

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="flight_number" class="block text-sm font-medium text-[#171717]">
                            Flight Number
                        </label>
                        <input
                            id="flight_number"
                            name="flight_number"
                            type="text"
                            placeholder="GA102"
                            class="h-11 w-full rounded-md border border-[#dcdee0] bg-[#ffffff] px-4 text-sm text-[#171717] font-mono placeholder:text-[#999999] focus:border-black focus:outline-none focus:ring-1 focus:ring-black"
                        />
                    </div>

                    <div class="space-y-2">
                        <label for="route" class="block text-sm font-medium text-[#171717]">
                            Route
                        </label>
                        <input
                            id="route"
                            name="route"
                            type="text"
                            placeholder="WAAA - WIII"
                            class="h-11 w-full rounded-md border border-[#dcdee0] bg-[#ffffff] px-4 text-sm text-[#171717] font-mono placeholder:text-[#999999] focus:border-black focus:outline-none focus:ring-1 focus:ring-black"
                        />
                    </div>

                    <div class="space-y-2">
                        <label for="cruising_altitude" class="block text-sm font-medium text-[#171717]">
                            Cruising Altitude (ft)
                        </label>
                        <input
                            id="cruising_altitude"
                            name="cruising_altitude"
                            type="text"
                            inputmode="numeric"
                            placeholder="36000"
                            class="h-11 w-full rounded-md border border-[#dcdee0] bg-[#ffffff] px-4 text-sm text-[#171717] font-mono placeholder:text-[#999999] focus:border-black focus:outline-none focus:ring-1 focus:ring-black"
                        />
                    </div>

                    <div class="space-y-2">
                        <label for="fuel_consumed" class="block text-sm font-medium text-[#171717]">
                            Fuel Consumed (kg)
                        </label>
                        <input
                            id="fuel_consumed"
                            name="fuel_consumed"
                            type="text"
                            inputmode="numeric"
                            placeholder="5400"
                            class="h-11 w-full rounded-md border border-[#dcdee0] bg-[#ffffff] px-4 text-sm text-[#171717] font-mono placeholder:text-[#999999] focus:border-black focus:outline-none focus:ring-1 focus:ring-black"
                        />
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label for="landing_rate" class="block text-sm font-medium text-[#171717]">
                            Landing Rate (fpm)
                        </label>
                        <input
                            id="landing_rate"
                            name="landing_rate"
                            type="text"
                            inputmode="numeric"
                            placeholder="-150"
                            class="h-11 w-full rounded-md border border-[#dcdee0] bg-[#ffffff] px-4 text-sm text-[#171717] font-mono placeholder:text-[#999999] focus:border-black focus:outline-none focus:ring-1 focus:ring-black"
                        />
                    </div>
                </div>

                <div class="mt-6 flex items-center gap-3">
                    <input
                        id="report_anomaly"
                        name="report_anomaly"
                        type="checkbox"
                        class="h-4 w-4 rounded border-[#dcdee0] text-black focus:ring-black"
                    />
                    <label for="report_anomaly" class="text-sm text-[#999999]">
                        Report Anomaly / Incident
                    </label>
                </div>

                <div class="mt-8">
                    <button
                        type="submit"
                        class="inline-flex h-10 items-center justify-center rounded-md bg-black px-5 text-sm font-medium text-white transition hover:bg-[#1a1a1a] focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2"
                    >
                        Submit Flight Log
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
