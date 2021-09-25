<?php

namespace App\Repositories\Eloquent;

use App\Models\Favorite;
use App\Repositories\Contracts\FavoriteRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class FavoriteRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class FavoriteRepositoryEloquent implements FavoriteRepositoryInterface
{
    /**
     * @var Favorite
     */
    private $favorite;

    /**
     * FavoriteRepositoryEloquent constructor.
     * @param Favorite $favorite
     */
    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * @param Favorite $favorite
     * @return Favorite
     */
    public function create(Favorite $favorite): Favorite
    {
        $favorite->save();
        return $favorite;
    }

    /**
     * @param int $userID
     * @return Collection
     */
    public function getUserFavorites(int $userID): Collection
    {
        return $this->favorite->where('user_id', '=', $userID)->get();
    }

    /**
     * @inheritDoc
     */
    public function delete(int $favoriteID): bool
    {
        $register = $this->favorite->findOrFail($favoriteID);
        return $register->delete();
    }
}
