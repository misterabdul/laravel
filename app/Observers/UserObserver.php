<?php

namespace App\Observers;

use App\Models\UserModel;
use Illuminate\SUpport\Facades\Log;

class UserObserver
{
    /**
     * Handle the user model "created" event.
     *
     * @param  \App\Models\UserModel  $user
     * @return void
     */
    public function created(UserModel $user)
    {
        Log::info('User created : ' . $user->uid);
    }

    /**
     * Handle the user model "updated" event.
     *
     * @param  \App\Models\UserModel  $user
     * @return void
     */
    public function updated(UserModel $user)
    {
        Log::info('User updated : ' . $user->uid);
    }

    /**
     * Handle the user model "deleted" event.
     *
     * @param  \App\Models\UserModel  $user
     * @return void
     */
    public function deleted(UserModel $user)
    {
        Log::info('User deleted : ' . $user->uid);
    }

    /**
     * Handle the user model "restored" event.
     *
     * @param  \App\Models\UserModel  $user
     * @return void
     */
    public function restored(UserModel $user)
    {
        Log::info('User restored : ' . $user->uid);
    }

    /**
     * Handle the user model "force deleted" event.
     *
     * @param  \App\Models\UserModel  $user
     * @return void
     */
    public function forceDeleted(UserModel $user)
    {
        Log::info('User force deleted : ', $user->toArray());
    }
}
