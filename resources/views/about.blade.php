@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-center mb-6">A propos de {{ $title }}</h1>

    <div class="grid grid-cols-3">
    @foreach ($team as $member)
        <div class="text-center">
            <a href="/a-propos/{{ $member['name'] }}">
                <img class="mx-auto" src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                {{ $member['name'] }}
                ({{ $member['job'] }})
            </a>
        </div>
    @endforeach
    </div>
@endsection
