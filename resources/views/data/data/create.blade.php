<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Methode SAW') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-home01" role="tabpanel" aria-labelledby="tabs-home-tab01" data-te-tab-active>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                        <p class="bg-gray-800 rounded-md text-white p-3  text-center">Masukkan Data</p>
                        <form method="POST" action="{{ route('data.store') }}">
                            @csrf
                            <div class="mb-6">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
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
                                                                <input type="number"
                                                                    name="data[{{ $a->id }}][{{ $k->id }}][value]"
                                                                    class="w-24" required>
                                                                <input type="hidden"
                                                                    name="data[{{ $a->id }}][{{ $k->id }}][id_alternatif]"
                                                                    value="{{ $a->id }}">
                                                                <input type="hidden"
                                                                    name="data[{{ $a->id }}][{{ $k->id }}][id_kriteria]"
                                                                    value="{{ $k->id }}">
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <button type="button" id="backButton"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-900 font-medium rounded-lg p-2.5 text-center">Back</button>
                                <button type="submit"
                                    class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg p-2.5 text-center">Simpan</button>
                            </div>
                            <script>
                                // Get a reference to the "Back" button
                                const backButton = document.getElementById('backButton');

                                // Add a click event listener to the "Back" button
                                backButton.addEventListener('click', function() {
                                    // Use window.history.back() to go back to the previous page
                                    window.history.back();
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
