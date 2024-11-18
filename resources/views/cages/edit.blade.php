<!-- resources/views/cages/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать клетку</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('cages.update', $cage->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $cage->name }}" required>
            </div>
            <div class="form-group">
                <label for="capacity">Вместимость</label>
                <input type="number" name="capacity" id="capacity" class="form-control" min="1" value="{{ $cage->capacity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection