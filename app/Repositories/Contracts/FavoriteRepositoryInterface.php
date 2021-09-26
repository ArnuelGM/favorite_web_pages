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

    /**
     * @param int $favoriteID
     * @return bool
     */
    public function delete(int $favoriteID): bool;

    /**
     * @param Favorite $favorite
     * @return Favorite
     */
    public function edit(Favorite $favorite): Favorite;

    /**
     * @param int $favoriteID
     * @return Favorite|null
     */
    public function findByID(int $favoriteID): ?Favorite;

}
