<?php

namespace App\Repositories\Contracts;

use App\Models\Favorite;
use Illuminate\Support\Collection;

/**
 * Interface FavoriteRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface FavoriteRepositoryInterface
{
    /**
     * @param Favorite $favorite
     * @return Favorite
     */
    public function create(Favorite $favorite): Favorite;

    /**
     * @param int $userID
     * @return Collection
     */
    public function getUserFavorites(int $userID): Collection;
}
