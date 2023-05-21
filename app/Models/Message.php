<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    use HasFactory;

    public static function getMessagesByUser(int $id, int $auth_id = 0)
    {
        if (!$auth_id) $auth_id = Auth::user()->id;

        // $chat = Chat::firstOrCreate() {

        // }

        $union_messages = DB::table('messages')
            ->where([
                'to_user' => $auth_id,
                'from_user' => $id
            ]);
        // ->join('users', 'users.id', '=', 'messages.from_user');

        return DB::query()->fromSub(
            DB::table('messages')
                ->where([
                    'to_user' => $id,
                    'from_user' => $auth_id
                ])
                ->union($union_messages),
            'messages'
        )
            ->join('user_infos', 'user_infos.users_id', '=', 'messages.from_user')
            ->orderBy('messages.id')
            ->paginate(50);

        // return DB::table('messages')
        //     ->where([
        //         'to_user' => $id,
        //         'from_user' => Auth::user()->id
        //     ])
        //     ->union($union_messages)
        //     ->join('users', 'users.id', '=', 'messages.from_user')
        //     ->orderBy('id')
        //     ->paginate(50);
    }
}
