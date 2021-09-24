<?php

namespace App\UseCases;

use App\Exceptions\CreateUserException;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\UseCases\Contracts\CreateUserUseCaseInterface;
use Exception;

/**
 * Class CreateUserUseCase
 * @package App\UseCases
 */
class CreateUserUseCase implements CreateUserUseCaseInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * CreateUserUseCase constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     * @throws Exception
     */
    public function handle(string $name, string $email, string $password): User
    {
        $existUser = $this->userRepository->findUserByEmail($email);
        if (!empty($existUser)) {
            throw new CreateUserException('Este correo ya se encuentra registrado!');
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        return $this->userRepository->create($user);
    }
}
