<?php

namespace App\Policies;

use App\Models\Hewan;
use App\Models\User;

class HewanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Semua user yang login bisa melihat daftar
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hewan $hewan): bool
    {
        // Admin bisa lihat semua, customer hanya lihat miliknya
        return $user->isAdmin() || $hewan->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Semua user yang login bisa create
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hewan $hewan): bool
    {
        return $user->isAdmin() || $hewan->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hewan $hewan): bool
    {
        // Cek status sebelum hapus
        if ($hewan->status === 'dititipkan') {
            return false; // Tidak bisa hapus yang masih dititipkan
        }
        
        if ($hewan->status === 'dirawat') {
            return false; // Tidak bisa hapus yang masih dirawat
        }
        
        return $user->isAdmin() || $hewan->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Hewan $hewan): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Hewan $hewan): bool
    {
        return $user->isAdmin();
    }
}