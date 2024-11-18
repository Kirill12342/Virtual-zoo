<!-- resources/views/cages/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <h1>{{ $cage->name }}</h1>
            </div>
            <div class="card-body">
                <p><strong>Вместимость:</strong> {{ $cage->capacity }}</p>
                <p><strong>Количество животных:</strong> {{ $cage->animals->count() }}</p>
                <h3>Животные в клетке:</h3>
                <div class="row">
                    @foreach($cage->animals as $animal)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    @if ($animal->image)
                                        <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="img-fluid img-thumbnail mb-2">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="No Image" class="img-fluid img-thumbnail mb-2">
                                    @endif
                                    <h5 class="card-title">{{ $animal->name }}</h5>
                                    <p class="card-text">Вид: {{ $animal->species }}</p>
                                    <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-info mb-2">Просмотр</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('cages.index') }}" class="btn btn-secondary">Назад к списку клеток</a>
                <a href="{{ route('cages.edit', $cage->id) }}" class="btn btn-warning">Редактировать</a>
                <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту клетку?')">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection