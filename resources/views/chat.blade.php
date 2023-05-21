@extends('layout.default')

@section('title', 'Чат')

@section('html')
    <div class="container">
        <div class="chat">
            <ul class="chat__list">
                @foreach ($chats as $chat)
                    <li class="chat__item">
                        <a class="chat__item_link" href="{{ URL::route('messages', $chat->users_id) }}">
                            <div class="chat__image">
                                <img src="{{ Storage::url('upload/image/' . $chat->avatar) }}" alt="">
                            </div>
                            <div class="chat__info">
                                <div class="chat__item_top">
                                    <strong class="chat__name">{{ $chat->name }}</strong>
                                    {{-- <time class="chat__time">11:47</time> --}}
                                </div>
                                {{-- <div class="chat__message">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis cum quam
                                    omnis
                                    maiores corrupti, labore repudiandae fugiat voluptate eveniet, aliquam nostrum?
                                    Molestias nostrum eligendi unde illum ipsum inventore quia accusamus.
                                </div> --}}
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
