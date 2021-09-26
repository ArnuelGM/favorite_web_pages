<?php

namespace App\UseCases\Contracts;

use App\Exceptions\EditFavoriteException;
use App\Models\Favorite;

/**
 * Interface EditFavoriteUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface EditFavoriteUseCaseInterface
{
    /**
     * @param int $favoriteID
     * @param string $title
     * @param string $url
     * @param string $description
     * @param bool $visibility
     * @param string $userID
     * @return Favorite
     *
     * @throws EditFavoriteException
     */
    public function handle(int $favoriteID, string $title, string $url, string $description, bool $visibility, string $userID): Favorite;
}
