<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 100; $i++) {
            $to_sender = random_int(1, 2);

            DB::table('messages')->insert([
                'to_user' => $to_sender,
                'from_user' => ($to_sender == 1 ? 2 : 1),
                'text' => Str::random(random_int(6, 48))
            ]);
        }
    }
}
