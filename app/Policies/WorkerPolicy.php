<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class WorkerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Worker $worker)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return (int)$user->role === User::ROLE_ADMIN ?
            Response::allow() :
            Response::denyWithStatus('404');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return (int)$user->role === User::ROLE_ADMIN ?
            Response::allow() :
            Response::denyWithStatus('403');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return (int)$user->role === User::ROLE_ADMIN ?
            Response::allow() :
            Response::denyWithStatus('403');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Worker $worker)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Worker $worker)
    {
        //
    }
}
