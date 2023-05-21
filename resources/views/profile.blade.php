@extends('layout.default')

@section('title', 'Профиль')

@section('html')
    <div class="container">
        <div class="user">
            <div class="user__left">
                <img class="user__img" decoding="async" loading="lazy" src="{{ Storage::url('upload/image/' . $user->avatar) }}"
                    alt="">
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
                        <span>{{ $user->is_man ? 'М' : 'Ж' }}</span>
                    </li>
                    @if ($user->about)
                        <li class="user__info_item">
                            <strong>О себе:</strong>
                            <span>{{ $user->about }}</span>
                        </li>
                    @endif
                </ul>
                <hr class="user__hr">
                <div class="user__interest">Интересует</div>
                <ul class="user__info_list">
                    <li class="user__info_item">
                        <strong>Лет:</strong>
                        <span>
                            @if (!$user->birth_year_max && !$user->birth_year_max)
                                -
                            @else
                                {{ $user->birth_year_min ? 'От ' . date('Y') - $user->birth_year_min : '' }}
                                {{ $user->birth_year_max ? date('Y') - $user->birth_year_max : '' }}
                            @endif
                        </span>
                    </li>
                    <li class="user__info_item">
                        <strong>Город:</strong>
                        <span>{{ $user->questionnaire_city }}</span>
                    </li>
                    <li class="user__info_item">
                        <strong>Пол:</strong>
                        <span>{{ $user->questionnaire_is_man === null ? '-' : ($user->questionnaire_is_man ? 'М' : 'Ж') }}</span>
                    </li>
                </ul>
                @if (Auth::check() && Auth::user()->id == $user->users_id)
                    <a class="user__message _edit" href="{{ route('profile_edit') }}">Редактировать</a>
                @else
                    <a class="user__message button" href="{{ route('messages', $user->users_id) }}">Написать</a>
                @endif
            </div>
        </div>
    </div>
@endsection
