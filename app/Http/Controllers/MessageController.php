<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function show(int $id): View
    {
        $user = UserInfo::find($id);

        $messages = Message::getMessagesByUser($id);

        return view('messages', [
            'user' => $user,
            'messages' => $messages
        ]);
    }

    public function createMessage(Request $request, int $id)
    {
        $token = $request->token;

        $user = User::where('token', $token)->get();

        $valid = $request->validate([
            $id => 'required',
            'text' => 'required'
        ]);



        // $chat = Chat::firstOrCreate([
        //     ''
        // ]);

        $query = Message::create([
            'text' => $request->text,
            'to_user' =>  $id,
            'from_user' => $user->id,
        ]);

        return $query;
    }

    public function getMessagesByUser(Request $request, int $id)
    {
        $token = $request->token;

        $user = User::where('token', $token)->get();

        return json_encode(
            Message::getMessagesByUser($id)
        );
    }
}
