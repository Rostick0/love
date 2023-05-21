@extends('layout.default')

@section('title', 'Чат')

@section('html')
    <div class="container">
        <div class="chat">
            <ul class="chat__list">
                <li class="chat__item">
                    <a class="chat__item_link" href="{{ URL::route('chat', 1) }}">
                        <div class="chat__image">
                            <img src="https://mykaleidoscope.ru/x/uploads/posts/2022-09/1663659291_6-mykaleidoscope-ru-p-obraz-uspeshnogo-cheloveka-krasivo-6.jpg"
                                alt="">
                        </div>
                        <div class="chat__info">
                            <div class="chat__item_top">
                                <strong class="chat__name">Моё имя</strong>
                                <time class="chat__time">11:47</time>
                            </div>
                            <div class="chat__message">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis cum quam
                                omnis
                                maiores corrupti, labore repudiandae fugiat voluptate eveniet, aliquam nostrum?
                                Molestias nostrum eligendi unde illum ipsum inventore quia accusamus.
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
