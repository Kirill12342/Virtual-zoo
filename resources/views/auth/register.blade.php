<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Регистрация</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
        <label for="password_confirmation">Подтверждение пароля:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
@endsection