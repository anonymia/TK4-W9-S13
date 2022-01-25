<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Aplikasi Perhitungan Nilai</title>
    </head>
    <body class="antialiased">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <form action="{{ empty($nilai) ? '/create' : '/'.$nilai->id }}" method="POST">
                            @csrf
                            @isset($nilai)
                            {{ method_field('PUT') }}
                            @endisset
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                                        <input type="text" name="name" id="name" value="{{ !empty($nilai) ? $nilai->name : '' }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mt-4">
                                        <label for="quis" class="block text-sm font-medium text-gray-700">Nilai Quis</label>
                                        <input type="number" min="0" max="100" name="quis" id="quis" value="{{ !empty($nilai) ? $nilai->quis : '' }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mt-4">
                                        <label for="tugas" class="block text-sm font-medium text-gray-700">Nilai Tugas</label>
                                        <input type="number" min="0" max="100" name="tugas" id="tugas" value="{{ !empty($nilai) ? $nilai->tugas : '' }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mt-4">
                                        <label for="absensi" class="block text-sm font-medium text-gray-700">Nilai Absensi</label>
                                        <input type="number" min="0" max="100" name="absensi" id="absensi" value="{{ !empty($nilai) ? $nilai->absensi : '' }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mt-4">
                                        <label for="praktek" class="block text-sm font-medium text-gray-700">Nilai Praktek</label>
                                        <input type="number" min="0" max="100" name="praktek" id="praktek" value="{{ !empty($nilai) ? $nilai->praktek : '' }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mt-4">
                                        <label for="uas" class="block text-sm font-medium text-gray-700">Nilai UAS</label>
                                        <input type="number" min="0" max="100" name="uas" id="uas" value="{{ !empty($nilai) ? $nilai->uas : '' }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <div class="px-4 py-3 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
