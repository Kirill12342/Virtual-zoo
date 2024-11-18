<!-- resources/views/animals/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $animal->name }}</h1>
    <p>Вид: {{ $animal->species }}</p>
    <p>Возраст: {{ $animal->age }}</p>
    <p>Описание: {{ $animal->description }}</p>
    <p>Клетка: <a href="{{ route('cages.show', $animal->cage->id) }}">{{ $animal->cage->name }}</a></p>
    @if($animal->image)
        <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="img-fluid">
    @endif
    <a href="{{ route('animals.index') }}" class="btn btn-secondary">Назад к списку животных</a>
    <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить это животное?')">Удалить</button>
    </form>
@endsection