<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatRoom extends Model
{
    use HasFactory;

    public static function getChatRooms()
    {
        $query = DB::table('chat_rooms')
            ->select('chats_id')
            ->where(
                'users_id',
                '=',
                Auth::user()->id
            )
            ->paginate(15);

        foreach ($query->items() as $item) {
            $query_array[] = $item->chats_id;
        }

        // $last_messages = DB::table('messages')
        //     ->where()
        //     ->limit(1)
        //     ->orderByDesc('messages.created_date');


        $t = DB::table('chat_rooms')
            ->join('user_infos', 'user_infos.users_id', '=', 'chat_rooms.users_id')
            // ->joinSub($last_messages, 'messages', function (JoinClause $join) {
            //     $join->on('messages.chats_id', '=', 'chat_rooms.chats_id');
            //     // ->orderByDesc('messages.chats_id');
            // })
            ->where('chat_rooms.users_id', '!=', Auth::user()->id)
            ->whereIn(
                'chat_rooms.chats_id',
                $query_array
            )
            // ->groupBy('messages.chats_id')
            ->get();

        dd($t);

        return $query;
    }
}
