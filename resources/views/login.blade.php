@extends('layout.default')

@section('title', 'Авторизация')

@section('html')
    <div class="container">
        <div class="center">
            <h2>Вход</h2>
            <form class="user__login" action="{{ url()->current() }}" method="post">
                @csrf
                <label class="label">
                    <span>Почта</span>
                    <input class="input" type="email" name="email" required>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </label>
                <label class="label">
                    <span>Пароль</span>
                    <input class="input" type="password" name="password" required>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </label>
                <button class="user__message button">Вход</button>
            </form>
        </div>
    </div>
@endsection
