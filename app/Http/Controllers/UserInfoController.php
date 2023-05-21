<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Nette\Utils\Random;

class UserInfoController extends Controller
{
    public function show(int $id): View
    {
        $user = UserInfo::getFullInfo($id);

        if (Auth::id() != $id) {
            GuestController::create($id);
        }

        return view('profile', [
            'user' => $user
        ]);
    }

    public function show_edit(): View
    {
        $user = UserInfo::getFullInfo(Auth::user()->id);

        return view('profile_edit', [
            'user' => $user
        ]);
    }

    public function store_edit(Request $request)
    {
        $user_id = Auth::user()->id;

        $credentials = $request->validate([
            'user_name' => 'required|max:255',
            'email' =>  'required|email|max:255"|unique:users,email,' . $user_id,
            'user_year' => 'required|numeric|min:1901|max:2099',
            'user_city' => 'required',
            'user_password' => 'required|min:4|max:255',
            'user_is_man' => 'required',
            'user_avatar' => 'image|mimes:jpeg,png,jpg'
        ]);

        User::where('id', Auth::user()->id)
            ->update([
                'email' =>  $request->email,
                'password' => Hash::make($request->user_password),
                'token' => md5(Random::generate(5) . time())
            ]);

        $user_infos_edit = [
            'name' => $request->user_name,
            'birth_year' => $request->user_year,
            'city' => ($request->user_city ?? NULL),
            'is_man' => $request->user_is_man,
            'about' => $request->user_about
        ];

        if ($request->file('user_avatar')) {
            $extension = $request->file('user_avatar')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;
            $path = $request->file('user_avatar')->storeAs('public/upload/image', $fileNameToStore);

            $user_infos_edit['avatar'] = $fileNameToStore;
        }


        DB::table('user_infos')
            ->where('users_id', $user_id)
            ->update($user_infos_edit);

        DB::table('user_questionnaires')
            ->where('users_id', $user_id)
            ->update([
                'birth_year_min' => $request->questionnaire_year_min,
                'birth_year_max' => $request->questionnaire_year_max,
                'city' => $request->questionnaire_city,
                'is_man' => $request->questionnaire_is_man
            ]);


        return back();
    }
}
