@extends('layout.default')

@section('title', 'Подборка')

@section('html')
    <div class="container">
        <div class="user">
            <div class="user__left">
                <img class="user__img" decoding="async" loading="lazy" src="{{ Storage::url('upload/image/' . $user->avatar) }}"
                    alt="{{ $user->name }}">
                <div class="user__forms">
                    <form action="{{ route('set_like', $user->users_id) }}" method="post">
                        @csrf
                        <button class="user__application _like">❤</button>
                    </form>
                    <form action="{{ route('set_skip', $user->users_id) }}" action="post">
                        @csrf
                        <button class="user__application _skip">✖</button>
                    </form>
                </div>
            </div>
            <div class="user__right">
                <div class="user__name">{{ $user->name }}</div>
                <ul class="user__info_list">
                    <li class="user__info_item">
                        <strong>Лет:</strong>
                        <span>{{ date('Y') - $user->birth_year }}</span>
                    </li>
                    <li class="user__info_item">
                        <strong>Город:</strong>
                        <span>{{ $user->city }}</span>
                    </li>
                    <li class="user__info_item">
                        <strong>Пол:</strong>
                        <span>{{ $user->is_main ? 'М' : 'Ж' }}</span>
                    </li>
                    @if ($user->about)
                        <li class="user__info_item">
                            <strong>О себе:</strong>
                            <span>{{ $user->about }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
