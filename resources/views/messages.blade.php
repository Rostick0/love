@extends('layout.default')

@section('title', 'Чат')

@section('html')
    <div class="container">
        <div class="chat-selected">
            <div class="messages">
                <div class="messages__top">
                    <a class="messages_name" href="{{ route('profile', $user->users_id) }}">{{ $user->name }}</a>
                    <a class="messages__avatar" href="{{ route('profile', $user->users_id) }}">
                        <img src="{{ Storage::url('upload/image/' . $user->avatar) }}" alt="{{ $user->name }}">
                    </a>
                </div>
                <ul class="messages__list">
                    @foreach ($messages as $message)
                        <li class="messages__item">
                            <div class="message__author">{{ $message->name }}</div>
                            <div class="message__content">
                                <div class="message__text">{{ $message->text }}</div>
                                <div class="messages__date">{{ $message->created_date }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <form action="" class="messages__form">
                    <input type="text" class="messages__input input">
                    <button class="messages__button button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path transform="scale(1.2)"
                                d="M8.8049,11.8178 L12.4619,17.7508 C12.6219,18.0108 12.8719,18.0078 12.9729,17.9938 C13.0739,17.9798 13.3169,17.9178 13.4049,17.6228 L17.9779,2.1778 C18.0579,1.9048 17.9109,1.7188 17.8449,1.6528 C17.7809,1.5868 17.5979,1.4458 17.3329,1.5208 L1.8769,6.0468 C1.5839,6.1328 1.5199,6.3788 1.5059,6.4798 C1.4919,6.5828 1.4879,6.8378 1.7469,7.0008 L7.7479,10.7538 L13.0499,5.3958 C13.3409,5.1018 13.8159,5.0988 14.1109,5.3898 C14.4059,5.6808 14.4079,6.1568 14.1169,6.4508 L8.8049,11.8178 Z M12.8949,19.4998 C12.1989,19.4998 11.5609,19.1458 11.1849,18.5378 L7.3079,12.2468 L0.9519,8.2718 C0.2669,7.8428 -0.0911,7.0788 0.0199,6.2758 C0.1299,5.4728 0.6809,4.8348 1.4549,4.6078 L16.9109,0.0818 C17.6219,-0.1262 18.3839,0.0708 18.9079,0.5928 C19.4319,1.1198 19.6269,1.8898 19.4149,2.6038 L14.8419,18.0478 C14.6129,18.8248 13.9729,19.3738 13.1719,19.4808 C13.0779,19.4928 12.9869,19.4998 12.8949,19.4998 L12.8949,19.4998 Z">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script defer>
        (function() {
            const messageList = document.querySelector(".messages__list");
            messageList.scrollTop = messageList.scrollHeight;
        })();

        fetch('/api/chat/2/message/?page=1&token=20c9c0816d0126b7ecffa1d290942455')
            .then(res => res.json())
            .then(res => console.log(res))
    </script>
@endsection
