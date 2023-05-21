@extends('layout.default')

@section('title', 'Чат')

@section('html')
    <div class="container">
        <div class="alert">
            <ul class="chat__list">
                @foreach ($alerts as $alert)
                    <li class="chat__item">
                        <a class="chat__item_link" href="{{ URL::route('profile', $alert->users_id) }}">
                            <div class="chat__image">
                                <img src="{{ Storage::url('upload/image/' . $alert->avatar) }}" alt="">
                            </div>
                            <div class="chat__info">
                                <div class="chat__item_top">
                                    <strong class="chat__name">{{ $alert->name }}</strong>
                                    <time class="chat__time">{{ $alert->created_date }}</time>
                                </div>
                                <div class="chat__message">
                                    @if ($alert->type === 'guest')
                                        Зашел(а) на вашу страницу
                                    @elseif ($alert->type === 'like')
                                        Лайкнул(а) вас в подборке
                                    @endif
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
