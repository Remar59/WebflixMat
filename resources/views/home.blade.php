@extends('layouts.app')

{{-- On prend le contenu de layouts/app.blade.php --}}
{{-- Le contenu de la section content va prendre
    la place du yield content --}}
@section('content')
    <h1 class="text-3xl text-center mb-3">Hello {{ $name }}</h1>

    <ul class="divide-y">
    @foreach ($games as $game)
        <li class="py-2">{{ $game }}</li>
    @endforeach
    </ul>
@endsection
