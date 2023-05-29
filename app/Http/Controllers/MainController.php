<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function show()
    {
        $user_infos = UserInfo::recommendation();

        // dd($user_infos);

        if ($user_infos->count() < 1) return redirect('/search');

        return view('main', [
            'user' => $user_infos[0]
        ]);
    }
}
