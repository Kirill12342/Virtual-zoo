<!-- resources/views/animals/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Животные</h1>
        @auth
            <a href="{{ route('animals.create') }}" class="btn btn-primary">Добавить животное</a>
        @endauth
    </div>
    <div class="row">
        @foreach($animals as $animal)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $animal->name }}</h5>
                        <p class="card-text">Вид: {{ $animal->species }}</p>
                        <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-info mb-2">Просмотр</a>
                        @auth
                            <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning mb-2">Редактировать</a>
                            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Вы уверены, что хотите удалить это животное?')">Удалить</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection