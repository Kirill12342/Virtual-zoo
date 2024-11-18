<!-- resources/views/animals/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Добавить животное</h1>
    <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="species">Вид:</label>
            <input type="text" name="species" id="species" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="age">Возраст:</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="cage_id">Клетка:</label>
            <select name="cage_id" id="cage_id" class="form-control" required>
                @foreach($cages as $cage)
                    <option value="{{ $cage->id }}">{{ $cage->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Изображение:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection