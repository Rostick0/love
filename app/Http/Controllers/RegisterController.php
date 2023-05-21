<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Nette\Utils\Random;

class RegisterController extends Controller
{
    public function show(): View
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'user_name' => 'required|max:255',
            'email' =>  'required|email|unique:users|max:255',
            'user_year' => 'required|numeric|min:1901|max:2099',
            'user_city' => 'required',
            'user_password' => 'required|min:4|max:255',
            'user_is_man' => 'required',
            'user_avatar' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $user = User::create([
            'email' =>  $request->email,
            'password' => Hash::make($request->user_password),
            'token' => md5(Random::generate(5) . time())
        ]);

        Auth::login($user);

        $user_id = Auth::user()->id;

        $extension = $request->file('user_avatar')->getClientOriginalExtension();
        $fileNameToStore = time() . '.' . $extension;
        $path = $request->file('user_avatar')->storeAs('public/upload/image', $fileNameToStore);

        DB::table('user_infos')->insert([
            'name' => $request->user_name,
            'birth_year' => $request->user_year,
            'city' => ($request->user_city ?? NULL),
            'is_man' => $request->user_is_man,
            'avatar' => $fileNameToStore,
            'about' => $request->user_about,
            'users_id' => $user_id
        ]);

        DB::table('user_questionnaires')->insert([
            'birth_year_min' => $request->questionnaire_year_min,
            'birth_year_max' => $request->questionnaire_year_max,
            'city' => $request->questionnaire_city,
            'is_man' => $request->questionnaire_is_man,
            'users_id' => $user_id
        ]);

        return redirect('/profile/' . $user_id);
    }
}
