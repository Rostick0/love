<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public static function create(int $user_id)
    {
        $request = Like::firstOrCreate([
            'to_user' => $user_id,
            'from_user' => Auth::id()
        ]);

        return redirect('/');
    }
}
