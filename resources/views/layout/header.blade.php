<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__container">
                <a class="header__title" href="{{ URL::route('main') }}">Знакомься</a>
                <nav class="header__nav">
                    <ul class="header__navigation">
                        <li class="header__navigation_item">
                            <a href="{{ URL::route('main') }}">Лента</a>
                        </li>
                        <li class="header__navigation_item">
                            <a href="{{ URL::route('search') }}">Поиск</a>
                        </li>
                        <li class="header__navigation_item">
                            <a href="{{ URL::route('chat') }}">Чат</a>
                        </li>
                        @if (Auth::check())
                            <li class="header__navigation_item">
                                <a href="{{ URL::route('profile', Auth::id()) }}">Профиль</a>
                            </li>
                        @else
                            <li class="header__navigation_item">
                                <a href="{{ URL::route('login') }}">Вход</a>
                            </li>
                            <li class="header__navigation_item">
                                <a href="{{ URL::route('register') }}">Регистрация</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
