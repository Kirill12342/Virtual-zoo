<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">Добро пожаловать в Виртуальный Зоопарк!</h1>
        <p class="lead">Управляйте своим зоопарком, добавляйте клетки и животных, и наслаждайтесь!</p>
        <hr class="my-4">
        <p>Начните с добавления новых клеток и животных.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('cages.index') }}" role="button">Клетки</a>
        <a class="btn btn-secondary btn-lg" href="{{ route('animals.index') }}" role="button">Животные</a>
    </div>
@endsection