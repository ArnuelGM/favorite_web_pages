<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

/**
 * Class UserRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class UserRepositoryEloquent implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepositoryEloquent constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findUserByEmail(string $email): ?User
    {
        return $this->user->where('email', '=', $email)->first();
    }

    /**
     * @param User $user
     * @return User
     */
    public function create(User $user): User
    {
        $user->password = bcrypt($user->password);
        $user->save();
        return $user;
    }
}
