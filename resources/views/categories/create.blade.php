@extends('layouts.app')

@section('content')
    <a href="/categories" class="text-gray-500">Retour aux catégories</a>
    <h1 class="text-3xl mb-3">Ajouter une catégorie</h1>

    @foreach ($errors->all() as $error)
        <p class="text-red-500">{{ $error }}</p>
    @endforeach

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="block">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="rounded shadow border-gray-300 w-full">
        </div>
        <button class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Sauvegarder</button>
    </form>
@endsection
