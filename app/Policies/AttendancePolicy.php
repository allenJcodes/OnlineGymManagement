<?php

namespace App\Policies;

use App\Models\Payments;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendancePolicy
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
        if ($user->user_role == 1 || $user->user_role == 3) {
            return true;
        }
    
        return false;
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
        if ($user->user_role == 1) {
            return true;
        }
    
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->user_role == 1) {
            return true;
        }
    
        return false;
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
        if ($user->user_role == 1) {
            return true;
        }
    
        return false;
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
        if ($user->user_role == 1) {
            return true;
        }
    
        return false;
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
        if ($user->user_role == 1) {
            return true;
        }
    
        return false;
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
        if ($user->user_role == 1) {
            return true;
        }
    
        return false;
    }
}
