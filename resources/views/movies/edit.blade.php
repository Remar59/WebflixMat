@extends('layouts.app')

@section('content')
<div class="mb-8"><a href="/films"
class="px-2 py-2 text-sm bg-gray-500 hover:bg-gray-300 duration-200 text-white rounded-full shadow-sm">Retour aux
films</a></div>
    <h1 class="text-3xl mb-3">Modifier {{$movie->title}}</h1>

    @foreach ($errors->all() as $error)
        <p class="text-red-500">{{ $error }}</p>
    @endforeach

    <form action="" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="block">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" class="rounded shadow border-gray-300 w-full">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="synopsis" class="block">Synopsis</label>
            <textarea name="synopsis" id="synopsis" class="rounded shadow border-gray-300 w-full">{{ old('synopsis'), $movie->synopsis }}</textarea>
            @error('synopsis')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="duration" class="block">Durée</label>
            <input type="text" name="duration" id="duration" value="{{ old('duration'), $movie->duration }}" class="rounded shadow border-gray-300 w-full">
            @error('duration')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="youtube" class="block">Youtube</label>
            <input type="text" name="youtube" id="youtube" value="{{ old('youtube'), $movie->youtube }}" class="rounded shadow border-gray-300 w-full">
            @error('youtube')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="released_at" class="block">Date de sortie</label>
            <input type="date" name="released_at" id="released_at" value="{{ old('released_at', $movie->released_at->format('Y-m-d')) }}" class="rounded shadow border-gray-300 w-full">
            @error('released_at')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="block">Catégorie</label>
            <select name="category" id="category" class="rounded shadow border-gray-300 w-full">
                @foreach ($categories as $category)
                    <option @selected($category->id == old('category',$movie->category_id)) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Ajouter</button>
    </form>
@endsection
