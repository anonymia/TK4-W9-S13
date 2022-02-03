<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Aplikasi Video Streaming</title>
    </head>
    <body class="antialiased">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="grid grid-cols-3 gap-4 mt-4 mx-4">
                            @forelse($videos as $video)
                            <div>
                                <video controls muted>
                                    <source src="public/{{ $video->filename }}">
                                </video>
                                <label class="block pt-4 text-sm font-bold text-gray-700 text-center">{{ $video->filename }}</label>
                                <form action="/{{ $video->id }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 -mr-16 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            @empty
                            <h1>No videos available</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 mr-6 text-right sm:px-6">
                    <form action="/create">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
