<?php

namespace App\Policies;

use App\Models\Beneficiary;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class BeneficiaryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Beneficiary $beneficiary): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Beneficiary $beneficiary): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Beneficiary $beneficiary): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Beneficiary $beneficiary): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Beneficiary $beneficiary): bool
    {
        return true;
    }
}
