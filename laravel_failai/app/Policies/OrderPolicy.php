<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response|bool
    {
        return true; // Laikinai iki kol atsiras Roles
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): Response|bool
    {
        return $user->id === $order->user_id
        || $user->role === User::ROLE_MANAGER
        || $user->role === User::ROLE_ADMIN
            ? Response::allow()
            : Response::deny(__('You do not own this order.'));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Order $order): Response|bool
    {
        return $user->id === $order->user_id  || $user->role === User::ROLE_MANAGER
            ? Response::allow()
            : Response::deny(__('You do not own this order.'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Order $order): Response|bool
    {
        return $user->id === $order->user_id /** || $user->role === 'manager' */
            ? Response::allow()
            : Response::deny(__('You do not own this order.'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Order $order): Response|bool
    {
        return $user->role === User::ROLE_MANAGER
            ? Response::allow()
            : Response::deny(__('You do not own this order.'));
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Order $order): Response|bool
    {
        return $user->role === User::ROLE_ADMIN
            ? Response::allow()
            : Response::deny(__('You do not own this order.'));
    }
}
