<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $users = [
        [
            'email' =>  'igor@gmail.com',
            'user_password' => 'igor@gmail.com',
            'user_name' => 'Игорь',
            'user_year' => 2003,
            'user_city' => 'Москва',
            'user_is_man' => 1,
            'avatar' => '1684582283.png',
            'user_about' => NULL,
            'users_id' => 1,
            'questionnaire_year_min' => NULL,
            'questionnaire_year_max' => NULL,
            'questionnaire_city' => NULL,
            'questionnaire_is_man' => NULL,
            'questionnaire_users_id' => 1
        ],
        [
            'email' =>  'test@test.com',
            'user_password' => 'test@test.com',
            'user_name' => 'Тест',
            'user_year' => 2000,
            'user_city' => 'Москва',
            'user_is_man' => 1,
            'avatar' => '1684592035.png',
            'user_about' => NULL,
            'users_id' => 2,
            'questionnaire_year_min' => NULL,
            'questionnaire_year_max' => NULL,
            'questionnaire_city' => NULL,
            'questionnaire_is_man' => 1,
            'questionnaire_users_id' => 2
        ]
    ];

    public function run()
    {
        foreach ($this->users as $user) {
            // dd($user['user_name']);
            $user_created = User::create([
                'email' =>  $user['email'],
                'password' => Hash::make($user['user_password']),
                'token' => md5(Random::generate(5) . time())
            ]);

            $user_id = $user_created->id;

            DB::table('user_infos')->insert([
                'name' => $user['user_name'],
                'birth_year' => $user['user_year'],
                'city' => $user['user_city'],
                'is_man' => $user['user_is_man'],
                'avatar' => $user['avatar'],
                'about' => $user['user_about'],
                'users_id' => $user_id
            ]);

            DB::table('user_questionnaires')->insert([
                'birth_year_min' => $user['questionnaire_year_min'],
                'birth_year_max' => $user['questionnaire_year_max'],
                'city' => $user['questionnaire_city'],
                'is_man' => $user['questionnaire_is_man'],
                'users_id' => $user_id
            ]);
        }
    }
}
