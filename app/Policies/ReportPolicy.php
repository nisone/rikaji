<?php

namespace App\Policies;

use App\Models\Report;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class ReportPolicy
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
    public function view(Admin $user, Report $report): bool
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
    public function update(Admin $user, Report $report): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Report $report): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Report $report): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Report $report): bool
    {
        return true;
    }
}
