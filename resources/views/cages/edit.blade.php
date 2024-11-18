<!-- resources/views/cages/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Редактировать клетку</h1>
    <form action="{{ route('cages.update', $cage->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $cage->name }}" required>
        </div>
        <div class="form-group">
            <label for="capacity">Вместимость:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $cage->capacity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection