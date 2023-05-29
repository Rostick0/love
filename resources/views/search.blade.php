@extends('layout.default')

@section('title', 'Поиск')

@section('html')
    <div class="container">
        <div class="search">
            <aside class="search__aside">
                <form class="search__form" action="{{ url()->current() }}">
                    <label class="label">
                        <span>Имя</span>
                        <input class="input" name="name" placeholder="Роман..." value="{{ Request::get('name') }}"
                            type="name">
                    </label>
                    <label class="label">
                        <span>Лет</span>
                        <div class="inputs-flex">
                            <input class="input" placeholder="От" name="age_min" value="{{ Request::get('age_min') }}"
                                type="number">
                            <input class="input" placeholder="До" name="age_max" value="{{ Request::get('age_max') }}"
                                type="number">
                        </div>
                    </label>
                    <label class="label">
                        <span>Город</span>
                        <select class="input" name="city">
                            @foreach (Config::get('constants.cities') as $city)
                            <option value=""></option>
                                <option @if ($city == urldecode(Request::get('city'))) selected @endif value="{{ $city }}">
                                    {{ $city }}</option>
                            @endforeach
                        </select>
                    </label>
                    <div class="label">
                        <span>Пол</span>
                        <label class="checkbox">
                            <input class="checkbox__input" type="radio" name="is_man"
                                @if ('1' === Request::get('is_man')) checked @endif value="1" hidden>
                            <span class="checkbox__icon"></span>
                            <span>Мужской</span>
                        </label>
                        <label class="checkbox">
                            <input class="checkbox__input" type="radio" name="is_man"
                                @if ('0' === Request::get('is_man')) checked @endif value="0" hidden>
                            <span class="checkbox__icon"></span>
                            <span>Женский</span>
                        </label>
                    </div>
                    <button class="search__button button">Поиск</button>
                    <a style="font-size: 14px" href="{{ route('search') }}">Сброс</a>
                </form>
            </aside>
            <div class="search__users">
                <ul class="search__users_list">
                    @foreach ($users as $user)
                        <li class="search__user">
                            <a class="search__user_link" href="{{ route('profile', $user->users_id) }}">
                                <div class="search__user_img">
                                    <img src="{{ Storage::url('upload/image/' . $user->avatar) }}"
                                        alt="{{ $user->name }}">
                                </div>
                                <div class="search__user_info">
                                    <div class="search__user_info_top">
                                        <span class="search__user_name">{{ $user->name }}, </span>
                                        <span class="search_user_age">{{ date('Y') - $user->birth_year }}</span>
                                    </div>
                                    <div class="search__user_city">{{ $user->city }}</div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{ $users->links('vendor.pagination') }}
            </div>
        </div>
    </div>
@endsection
