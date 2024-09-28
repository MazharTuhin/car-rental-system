<?php

namespace App\Policies;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RentalPolicy
{
    public function view(User $user, Rental $rental): bool
    {
        return $user->id === $rental->user_id;
    }

    public function cancel(User $user, Rental $rental): bool
    {
        return $user->id === $rental->user_id && $rental->status === 'ongoing' && $rental->start_date > now();
    }

    public function create(User $user)
    {
        return $user->isCustomer();
    }
}
