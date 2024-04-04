<?php

namespace App\Policies;

use App\Models\LearnContent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LearnContentPolicy
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
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearnContent  $learnContent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, LearnContent $learnContent)
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
     * @param  \App\Models\LearnContent  $learnContent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, LearnContent $learnContent)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearnContent  $learnContent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, LearnContent $learnContent)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearnContent  $learnContent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, LearnContent $learnContent)
    {
        return $user->user_role == 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearnContent  $learnContent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, LearnContent $learnContent)
    {
        return $user->user_role == 1;
    }
}