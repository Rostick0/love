<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function show(Request $request): View
    {
        $users = UserInfo::search($request);

        return view('search', [
            'users' => $users
        ]);
    }
}
