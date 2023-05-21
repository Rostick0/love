<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function show(): View
    {
        $user_infos = UserInfo::recommendation();

        // dd($user_infos->name);

        return view('main', [
            'user' => $user_infos
        ]);
    }
}
