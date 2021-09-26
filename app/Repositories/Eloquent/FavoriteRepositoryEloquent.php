<?php

namespace App\Repositories\Eloquent;

use App\Models\Favorite;
use App\Models\FavoriteCategory;
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
        return $this->favorite->where('user_id', '=', $userID)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function delete(int $favoriteID): bool
    {
        $favorite = $this->favorite->findOrFail($favoriteID);
        $favorite->categoriesRelated()->delete();
        return $favorite->delete();
    }

    /**
     * @param Favorite $favorite
     * @return Favorite
     */
    public function edit(Favorite $favorite): Favorite
    {
        $favorite->save();
        return $favorite;
    }

    /**
     * @param int $favoriteID
     * @return Favorite|null
     */
    public function findByID(int $favoriteID): ?Favorite
    {
        return $this->favorite->find($favoriteID);
    }

    /**
     * @inheritDoc
     */
    public function getCategoriesByFavoriteID(Favorite $favorite): Collection
    {
        return $favorite->categoriesRelated;
    }

    /**
     * @inheritDoc
     */
    public function associateCategories(Favorite $favorite, array $categories): Collection
    {
        $records = collect();
        foreach ($categories as $categoryID) {
            $newRelation = new FavoriteCategory();
            $newRelation->category_id = $categoryID;
            $newRelation->favorite_id = $favorite->id;
            $newRelation->created_at = date('Y-m-d H:i:s');
            $newRelation->save();
            $records->push($newRelation);
        }

        return $records;
    }

    /**
     * @inheritDoc
     */
    public function updateCategories(Favorite $favorite, array $categories): Collection
    {
        $favorite->categoriesRelated()->delete();
        return $this->associateCategories($favorite, $categories);
    }

    /**
     * @inheritDoc
     */
    public function getPublicFavorites(): Collection
    {
        return $this->favorite->where('visibility', '=', Favorite::PUBLIC_VISIBILITY)
            ->orderBy('id', 'desc')
            ->get();
    }
}
