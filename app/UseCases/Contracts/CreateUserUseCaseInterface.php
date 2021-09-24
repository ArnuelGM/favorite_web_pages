<?php

namespace App\UseCases\Contracts;

/**
 * Interface CreateUserUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface CreateUserUseCaseInterface
{
    /**
     * caso de uso dedicado a la creación de usuarios
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function handle(string $name, string $email, string $password): bool;
}
