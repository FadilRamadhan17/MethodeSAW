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
                        $active = true; // Atau sesuaikan dengan logika Anda untuk menentukan apakah tautan saat ini aktif
                    @endphp
                    <a href="{{ route('kriteria') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Kriteria
                    </a>
                </li>

                <li class="flex-auto text-center">
                    <a href="{{ route('alternatif') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
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

            <!--Tabs content-->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-12">
                    <a href="{{ route('data.create') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-6">Update
                        Data</a>
                    @if (Session::has('success'))
                        <div id="success-alert"
                            class="alert alert-success mt-3 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            {{ Session::get('success') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                var successAlert = document.getElementById('success-alert');
                                successAlert.style.display = 'none';
                            }, 5000);
                        </script>
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-5">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3"></th>
                                    @foreach ($kriteria as $k)
                                        <th scope="col" class="px-6 py-3">
                                            {{ $k->kriteria }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatif as $a)
                                    <tr class="bg-white dark:bg-gray-900 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $a->nama }}
                                        </td>
                                        @foreach ($kriteria as $k)
                                            <td class="px-6 py-4">
                                                @if ($data->isNotEmpty())
                                                    {{ $data->where('alternatif_id', $a->id)->where('kriteria_id', $k->id)->first()->value }}
                                                @else
                                                    
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
