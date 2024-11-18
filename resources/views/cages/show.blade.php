<!-- resources/views/cages/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $cage->name }}</h1>
    <p>Вместимость: {{ $cage->capacity }}</p>
    <h2>Животные в клетке:</h2>
    <ul>
        @foreach($cage->animals as $animal)
            <li>{{ $animal->name }} ({{ $animal->species }})</li>
        @endforeach
    </ul>
    <a href="{{ route('cages.index') }}">Назад к списку клеток</a>
    <a href="{{ route('cages.edit', $cage->id) }}">Редактировать</a>
@endsection