<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return auth()->user()->email === 'ashrafalmayah00@gmail.com';
    }

    public function edit(User $user, User $model)
    {
        return (bool) rand(0, 1);
    }
}
