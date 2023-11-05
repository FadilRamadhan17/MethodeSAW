<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Methode SAW') }}
        </h2>
    </x-slot>
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0">
                <li class="flex-auto text-center">
                    @php
                        $active = false; // Atau sesuaikan dengan logika Anda untuk menentukan apakah tautan saat ini aktif
                    @endphp
                    <a href="{{ route('kriteria') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out {{ $active ? 'border-b-2 border-indigo-400' : 'border-b-2 border-transparent' }}">
                        Kriteria
                    </a>
                </li>

                <li class="flex-auto text-center">
                    <a href="{{ route('alternatif') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out {{ $active ? 'border-b-2 border-indigo-400' : 'border-b-2 border-transparent' }}">
                        Alternatif
                    </a>
                </li>
                <li class="flex-auto text-center">
                    <a href="{{ route('data.value') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out {{ $active ? 'border-b-2 border-indigo-400' : 'border-b-2 border-transparent' }}">
                        Data
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
