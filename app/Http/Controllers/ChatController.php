<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function show(): View
    {
        ChatRoom::getChatRooms();

        return view('chat');
    }

    public function get()
    {
        return DB::table('chats')
            ->where([
                ''
            ])
            ->paginate(15);
    }
}
