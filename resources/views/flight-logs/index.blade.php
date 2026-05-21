<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Log Penerbangan
        </h2>
    </x-slot>

    <div class="py-12" data-reveal>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6" data-reveal>
                <h3 class="text-lg font-bold mb-4">Daftar Log Penerbangan</h3>
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Pilot</th>
                            <th class="border border-gray-300 px-4 py-2">Kode Pesawat</th>
                            <th class="border border-gray-300 px-4 py-2">Rute</th>
                            <th class="border border-gray-300 px-4 py-2">Bahan Bakar</th>
                            <th class="border border-gray-300 px-4 py-2">Durasi</th>
                            <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flightLogs as $log)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->aircraft_code }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->route->route_code }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->fuel_consumption }} L</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->flight_duration }} menit</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->flight_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>