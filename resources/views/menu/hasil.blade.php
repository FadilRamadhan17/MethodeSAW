<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Methode SAW') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <p class="bg-gray-800 rounded-md text-white p-3 text-center">Berikut Hasil Methode WP</p>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-5">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alternatif Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alternatif Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nilai Preferensi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rank
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranking as $rankedItem)
                                <tr class="bg-white dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $rankedItem['alternatif_name'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $rankedItem['alternatif_keterangan'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $rankedItem['final_value'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $rankedItem['rank'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
