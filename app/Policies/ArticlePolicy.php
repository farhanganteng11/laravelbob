<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * Semua user yang login bisa melihat daftar artikel
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Semua user yang login bisa melihat detail artikel
     */
    public function view(User $user, Article $article): bool
    {
        return true;
    }

    /**
     * Semua user yang login boleh membuat artikel
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Hanya pemilik artikel atau admin yang bisa update
     */
    public function update(User $user, Article $article): bool
    {
        return $user->id === $article->user_id || $user->role === 'admin';
    }

    /**
     * Hanya pemilik artikel atau admin yang bisa hapus
     */
    public function delete(User $user, Article $article): bool
    {
        return $user->id === $article->user_id || $user->role === 'admin';
    }

    /**
     * Restore tidak dipakai di latihan ini
     */
    public function restore(User $user, Article $article): bool
    {
        return false;
    }

    /**
     * Force delete tidak dipakai di latihan ini
     */
    public function forceDelete(User $user, Article $article): bool
    {
        return false;
    }
}
