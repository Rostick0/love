<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(int $id): View
    {
        return view('profile');
    }

    public function show_edit(): View
    {
        return view('profile_edit');
    }
}
