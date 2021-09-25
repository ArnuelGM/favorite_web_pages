<?php

namespace App\UseCases;

use App\Exceptions\LoginUserException;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\UseCases\Contracts\LoginUserUseCaseInterface;
use Illuminate\Support\Facades\Hash;

/**
 * Class LoginUserUseCase
 * @package App\UseCases
 */
class LoginUserUseCase implements LoginUserUseCaseInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * LoginUserUseCase constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function handle(string $email, string $password): void
    {
        $user = $this->userRepository->findUserByEmail($email);
        if (empty($user)) {
            throw new LoginUserException('Este usuario no se encuentra registrado!');
        }

        $this->passwordCorrect($user, $password);
        auth()->login($user);
    }

    /**
     * @param User $user
     * @param $suppliedPassword
     * @throws LoginUserException
     */
    private function passwordCorrect(User $user, string $suppliedPassword): void
    {
        if(!Hash::check($suppliedPassword, $user->password, [])) {
            throw new LoginUserException('La contraseña no es correcta!');
        }
    }
}
