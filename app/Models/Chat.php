<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    use HasFactory;

    // public function getChats()
    // {
    //     return DB::table('chat_rooms')
    //         ->where(
    //             'users_id',
    //             '=',
    //             Auth::user()->id
    //         )
    //         ->join('users', 'users.id', '=', 'chats')
    //         ->paginate(15);
    // }
}
