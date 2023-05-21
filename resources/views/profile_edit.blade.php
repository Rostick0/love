@extends('layout.default')

@section('title', 'Редактирование')

@section('html')
    <div class="container">
        <div class="user">
            <div class="user__left">
                <img class="user__img" decoding="async" loading="lazy" src="{{ Storage::url('upload/image/' . $user->avatar) }}"
                    alt="">
            </div>
            <form class="user__right" method="post" enctype="multipart/form-data">
                @csrf
                <ul class="user__info_list">
                    <li class="user__info_item">
                        <strong>Имя:</strong>
                        <div class="user__info_field">
                            <input class="input" type="text" name="user_name"
                                value="{{ old('user_name') ?? $user->name }}"required />
                            @error('user_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                    <li class="user__info_item">
                        <strong>Почта:</strong>
                        <div class="user__info_field">
                            <input class="input" type="email" name="email" value="{{ old('email') ?? $user->email }}"
                                required />
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                    <li class="user__info_item">
                        <strong>Пароль:</strong>
                        <div class="user__info_field">
                            <input class="input" type="password" name="user_password" required />
                            @error('user_password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                    <li class="user__info_item">
                        <strong>Год рождения:</strong>
                        <div class="user__info_field">
                            <input class="input" type="number" min="1901" max="2099" step="1"
                                name="user_year" value="{{ old('user_year') ?? $user->birth_year }}" required />
                            @error('user_year')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                    <li class="user__info_item">
                        <strong>Город:</strong>
                        <div class="user__info_field">
                            <select class="input" name="user_city" required>
                                @foreach (Config::get('constants.cities') as $city)
                                    <option {{ old('user_city') == $user->city ? 'selected' : '' }}
                                        value="{{ $city }}">
                                        {{ $city }}</option>
                                @endforeach
                            </select>
                            @error('user_year')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                    <li class="user__info_item flex-row">
                        <strong>Пол:</strong>
                        <div class="user__info_field">
                            <div class="user__info_item_flex">
                                <label class="checkbox">
                                    <input class="checkbox__input" @if ((old('user_is_man') ?? (string) $user->is_man) === '1') checked @endif
                                        type="radio" name="user_is_man" value="1" hidden>
                                    <span class="checkbox__icon"></span>
                                    <span>Мужской</span>
                                </label>
                                <label class="checkbox">
                                    <input class="checkbox__input" @if ((old('user_is_man') ?? (string) $user->is_man) === '0') checked @endif
                                        type="radio" name="user_is_man" value="0" hidden>
                                    <span class="checkbox__icon"></span>
                                    <span>Женский</span>
                                </label>
                            </div>
                            @error('user_year')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                    <li class="user__info_item flex-column">
                        <strong>О себе:</strong>
                        <textarea class="input textarea" rows="3" name="user_about">{{ old('user_about') ?? $user->about }}</textarea>
                    </li>
                    <li class="user__info_item flex-column">
                        <strong>Вставить фотографию:</strong>
                        <div class="user__info_field" style="max-width: unset;">
                            <input class="input file-upload" type="file" name="user_avatar"
                                accept="image/png, image/jpeg">
                            @error('user_year')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                </ul>
                <hr class="user__hr">
                <div class="user__interest">Интересует</div>
                <ul class="user__info_list">
                    <li class="user__info_item">
                        <strong>Количество лет:</strong>
                        <div class="user__info_item_flex">
                            <input class="input" type="number" placeholder="От" min="1" step="1"
                                name="questionnaire_year"
                                value="{{ old('questionnaire_year_min') ?? $user->birth_year_max }}" />
                            <input class="input" type="number" placeholder="До" min="1" step="1"
                                name="questionnaire_year"
                                value="{{ old('questionnaire_year_max') ?? $user->birth_year_max }}" />
                        </div>
                    </li>
                    <li class="user__info_item">
                        <strong>Город:</strong>
                        <select class="input" name="questionnaire_city">
                            <option value=""></option>
                            @foreach (Config::get('constants.cities') as $city)
                                <option
                                    {{ (old('questionnaire_city') ?? $user->questionnaire_city) == $city ? 'selected' : '' }}
                                    value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="user__info_item flex-row">
                        <strong>Пол:</strong>
                        <div class="user__info_item_flex">
                            <label class="checkbox">
                                <input class="checkbox__input" @if ((old('questionnaire_is_man') ?? (string) $user->questionnaire_is_man) === '1') checked @endif
                                    type="radio" name="questionnaire_is_man" value="1" hidden>
                                <span class="checkbox__icon"></span>
                                <span>Мужской</span>
                            </label>
                            <label class="checkbox">
                                <input class="checkbox__input" @if ((old('questionnaire_is_man') ?? (string) $user->questionnaire_is_man) === '0') checked @endif
                                    type="radio" name="questionnaire_is_man" value="0" hidden>
                                <span class="checkbox__icon"></span>
                                <span>Женский</span>
                            </label>
                        </div>
                    </li>
                </ul>
                <button class="user__message button">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
