<!-- resources/views/animals/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <h1>{{ $animal->name }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($animal->image)
                            <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="img-fluid img-thumbnail">
                        @else
                            <img src="https://via.placeholder.com/150" alt="No Image" class="img-fluid img-thumbnail">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><strong>Вид:</strong> {{ $animal->species }}</p>
                        <p><strong>Возраст:</strong> {{ $animal->age }}</p>
                        <p><strong>Описание:</strong> {{ $animal->description }}</p>
                        <p><strong>Клетка:</strong> {{ $animal->cage->name }}</p>
                        <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить это животное?')">Удалить</button>
                        </form>
                        <a href="{{ route('animals.index') }}" class="btn btn-secondary">Назад к списку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection