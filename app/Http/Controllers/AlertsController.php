<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AlertsController extends Controller
{
    public function show(): View
    {
        $alerts = DB::table('alerts')
            ->where('to_user', '=', Auth::id())
            ->join('user_infos', 'user_infos.users_id', '=', 'alerts.from_user')
            ->get();

        DB::table('alerts')
            ->where('to_user', '=', Auth::id())
            ->update([
                'is_read' => 1
            ]);

        return view('alert', [
            'alerts' => $alerts
        ]);
    }
}
