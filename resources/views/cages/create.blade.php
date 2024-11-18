<!-- resources/views/cages/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Добавить клетку</h1>
    <form action="{{ route('cages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="capacity">Вместимость:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection