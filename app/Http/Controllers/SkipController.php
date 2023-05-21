<?php

namespace App\Http\Controllers;

use App\Models\Skip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkipController extends Controller
{
    public static function create(int $user_id)
    {
        $request = Skip::firstOrCreate([
            'to_user' => $user_id,
            'from_user' => Auth::id()
        ]);

        return redirect('/');
    }
}
