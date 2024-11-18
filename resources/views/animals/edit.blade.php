<!-- resources/views/animals/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать животное</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="species">Вид</label>
                <input type="text" name="species" id="species" class="form-control" value="{{ $animal->species }}" required>
            </div>
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $animal->name }}" required>
            </div>
            <div class="form-group">
                <label for="age">Возраст</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ $animal->age }}" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control" required>{{ $animal->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="cage_id">Клетка</label>
                <select name="cage_id" id="cage_id" class="form-control" required>
                    @foreach($cages as $cage)
                        <option value="{{ $cage->id }}" {{ $animal->cage_id == $cage->id ? 'selected' : '' }}>{{ $cage->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($animal->image)
                    <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection