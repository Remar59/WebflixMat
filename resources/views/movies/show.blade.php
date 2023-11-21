@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <a href="/films"
            class="px-2 py-2 text-sm bg-gray-500 hover:bg-gray-300 duration-200 text-white rounded-full shadow-sm">Retour aux
            films</a>
    </div>

    <div class="flex gap-10">
        <div class="w-2/5">
            <img class="w-full" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
        </div>
        <div class="w-3/5">
            <div class="border p-4 shadow-lg">
                <h1 class="text-3xl">{{ $movie->title }}</h1>
                <p class="my-3">{{ $movie->synopsis }}</p>
                <p><strong>Durée: </strong>{{ $movie->duration() }}</p>

                @if ($movie->released_at)
                    <p class="my-2"><strong>Sortie: </strong>{{ $movie->released_at->translatedFormat('d F Y') }}</p>
                @endif
                @if ($movie->category_id)
                    <p class="my-2"><strong>Catégorie: </strong>{{ $movie->category->name }}</p>
                @endif
            </div>
            @if($movie->youtube)
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$movie->youtube}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
        </div>
    </div>
@endsection
