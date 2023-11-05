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
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-12">
                        <p class="font-semibold text-black text-center pb-3">Masukkan Data Kriteria</p>
                        <form method="POST" action="{{ route('alternatif.store') }}">
                            <!-- Modal form content goes here -->
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3" role="alert" id="danger-alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <script>
                                    setTimeout(function() {
                                        var successAlert = document.getElementById('danger-alert');
                                        successAlert.style.display = 'none';
                                    }, 5000);
                                </script>
                            @endif
                            @csrf
                            <div class="mb-6">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                <input type="nama" id="nama" name="nama"
                                    class="w-full px-4 py-2.5 border rounded-lg" required>
                            </div>
                            <div class="mb-6">
                                <label for="keterangan"
                                    class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                                <input type="keterangan" id="keterangan" name="keterangan"
                                    class="w-full px-4 py-2.5 border rounded-lg" required>
                            </div>
                            <div class="flex flex-row justify-between">
                                <button type="button" id="backButton"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-900 font-medium rounded-lg p-2.5 text-center">Back</button>
                                <button type="submit"
                                    class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg p-2.5 text-center">Submit</button>
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
        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-profile01" role="tabpanel" aria-labelledby="tabs-profile-tab01">
            Tab 2 content
        </div>
        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-messages01" role="tabpanel" aria-labelledby="tabs-profile-tab01">
            Tab 3 content
        </div>
    </div>
    <script>
        import {
            Tab,
            initTE,
        } from "tw-elements";

        initTE({
            Tab
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    </div>
    </div>
</x-app-layout>
