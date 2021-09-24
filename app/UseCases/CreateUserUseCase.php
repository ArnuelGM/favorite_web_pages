<?php

namespace App\UseCases;

use App\UseCases\Contracts\CreateUserUseCaseInterface;

/**
 * Class CreateUserUseCase
 * @package App\UseCases
 */
class CreateUserUseCase implements CreateUserUseCaseInterface
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function handle(string $name, string $email, string $password): bool
    {
        return true;
    }
}
