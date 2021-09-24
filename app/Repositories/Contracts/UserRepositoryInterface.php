<?php

namespace App\Repositories\Contracts;

use App\Models\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface UserRepositoryInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    public function findUserByEmail(string $email): ?User;

    /**
     * @param User $user
     * @return User
     */
    public function create(User $user): User;
}
