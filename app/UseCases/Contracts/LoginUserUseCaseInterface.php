<?php

namespace App\UseCases\Contracts;

use App\Exceptions\LoginUserException;

/**
 * Interface LoginUserUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface LoginUserUseCaseInterface
{
    /**
     * @param string $email
     * @param string $password
     * @throws LoginUserException
     */
    public function handle(string $email, string $password): void;
}
