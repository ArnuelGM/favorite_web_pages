<?php

namespace App\UseCases\Contracts;

use App\Exceptions\CreateFavoriteException;
use App\Models\Favorite;

/**
 * Interface CreateFavoriteUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface CreateFavoriteUseCaseInterface
{
    /**
     * @param string $title
     * @param string $url
     * @param string $description
     * @param bool $visibility
     * @return Favorite
     * @throws CreateFavoriteException
     */
    public function handle(string $title, string $url, string $description, bool $visibility, int $userID): Favorite;
}
