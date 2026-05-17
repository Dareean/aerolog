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