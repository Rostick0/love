<?php

namespace App\Observers;

use App\Models\Alert;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GuestObserver
{
    /**
     * Handle the Guest "created" event.
     *
     * @param  \App\Models\Guest  $guest
     * @return void
     */
    public function created(Guest $guest)
    {
        Alert::create([
            'type' => 'guest',
            'to_user' => $guest->to_user,
            'from_user' => $guest->from_user
        ]);
        // DB::table('alerts')->insert([
        //     'to_user' => $guest->to_user,
        //     'from_user' => $guest->from_user,
        //     'type' => 'guest'
        // ]);
    }

    /**
     * Handle the Guest "updated" event.
     *
     * @param  \App\Models\Guest  $guest
     * @return void
     */
    public function updated(Guest $guest)
    {
        //
    }

    /**
     * Handle the Guest "deleted" event.
     *
     * @param  \App\Models\Guest  $guest
     * @return void
     */
    public function deleted(Guest $guest)
    {
        //
    }

    /**
     * Handle the Guest "restored" event.
     *
     * @param  \App\Models\Guest  $guest
     * @return void
     */
    public function restored(Guest $guest)
    {
        //
    }

    /**
     * Handle the Guest "force deleted" event.
     *
     * @param  \App\Models\Guest  $guest
     * @return void
     */
    public function forceDeleted(Guest $guest)
    {
        //
    }
}
