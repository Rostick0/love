<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function show(): View
    {
        $chats = Chat::get();

        return view('chat', [
            'chats' => $chats
        ]);
    }
}
