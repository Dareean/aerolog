<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Log Penerbangan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('flight-logs.store') }}">
                    @csrf

                    <!-- Rute -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Rute Penerbangan</label>
                        <select name="route_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">-- Pilih Rute --</option>
                            @foreach($routes as $route)
                                <option value="{{ $route->id }}">
                                    {{ $route->route_code }} - {{ $route->origin_airport }} → {{ $route->destination_airport }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('route_id')" class="mt-2" />
                    </div>

                    <!-- Kode Pesawat -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Kode Pesawat</label>
                        <input type="text" name="aircraft_code" value="{{ old('aircraft_code') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Contoh: PK-GFA" required />
                        <x-input-error :messages="$errors->get('aircraft_code')" class="mt-2" />
                    </div>

                    <!-- Konsumsi Bahan Bakar -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Konsumsi Bahan Bakar (Liter)</label>
                        <input type="number" name="fuel_consumption" value="{{ old('fuel_consumption') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Contoh: 5000" required />
                        <x-input-error :messages="$errors->get('fuel_consumption')" class="mt-2" />
                    </div>

                    <!-- Durasi Penerbangan -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Durasi Penerbangan (Menit)</label>
                        <input type="number" name="flight_duration" value="{{ old('flight_duration') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Contoh: 120" required />
                        <x-input-error :messages="$errors->get('flight_duration')" class="mt-2" />
                    </div>

                    <!-- Tanggal Penerbangan -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Tanggal Penerbangan</label>
                        <input type="date" name="flight_date" value="{{ old('flight_date') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        <x-input-error :messages="$errors->get('flight_date')" class="mt-2" />
                    </div>

                    <!-- Catatan -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Catatan (Opsional)</label>
                        <textarea name="notes"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Catatan tambahan...">{{ old('notes') }}</textarea>
                        <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('flight-logs.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Simpan Log
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>