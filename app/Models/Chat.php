<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    use HasFactory;

    public static function get()
    {
        $union = Message::select('to_user')
            ->distinct()
            ->where('from_user', '=', Auth::id());

        $chats = Message::union($union)
            ->select('from_user')
            ->distinct()
            ->where('to_user', '=', Auth::id())
            ->get();

        $where_sql = [];

        foreach ($chats as $chat) {
            $where_sql[] = $chat['from_user'];
        }

        return UserInfo::whereIn('users_id', $where_sql)->get();
    }
}
