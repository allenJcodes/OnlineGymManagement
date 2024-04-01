<?php

namespace App\Policies;

use App\Models\Payments;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return ($user->user_role == 1 || $user->user_role == 3);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Payments $payments)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Payments $payments)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Payments $payments)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Payments $payments)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Payments $payments)
    {
        return $user->user_role == 1;
    }
}
