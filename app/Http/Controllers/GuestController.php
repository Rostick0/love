<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Guest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public static function create(int $user_id)
    {
        $alert = Alert::where([
            'to_user' => $user_id,
            'from_user' => Auth::id(),
            'type' => 'guest',
        ])->orderByDesc('id')
            ->first();

        if ($alert && Carbon::parse($alert->created_date)->addDays(30) > Carbon::today()->toDateString()) return;

        Guest::create([
            'to_user' => $user_id,
            'from_user' => Auth::id()
        ]);
    }
}
