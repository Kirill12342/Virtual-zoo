<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Войти</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Войти</button>
    </form>
@endsection