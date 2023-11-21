@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-center mb-3">Bonjour, je suis Fiorella</h1>
    <p>Tu as {{ $age }} ans.</p>

    @if ($age >= 18)
        <p>Tu es majeur(e).</p>
    @else
        <p>Tu n'es pas majeur(e).</p>
    @endif

    <p>Couleur choisie : {{ $color }}</p>

    @if ($friend)
    <p>Fiorella joue avec {{ $friend }}</p>
    @endif
@endsection
