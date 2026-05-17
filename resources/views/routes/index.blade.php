<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Rute
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Daftar Rute Maskapai</h3>
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Kode Rute</th>
                            <th class="border border-gray-300 px-4 py-2">Asal</th>
                            <th class="border border-gray-300 px-4 py-2">Tujuan</th>
                            <th class="border border-gray-300 px-4 py-2">Maskapai</th>
                            <th class="border border-gray-300 px-4 py-2">Durasi (menit)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routes as $route)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $route->route_code }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $route->origin_airport }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $route->destination_airport }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $route->airline_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $route->estimated_duration }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>