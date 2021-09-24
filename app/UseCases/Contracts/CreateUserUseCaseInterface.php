<?php

namespace App\UseCases\Contracts;

use App\Models\User;

/**
 * Interface CreateUserUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface CreateUserUseCaseInterface
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public function handle(string $name, string $email, string $password): User;
}
