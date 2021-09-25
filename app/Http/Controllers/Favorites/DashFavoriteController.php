<?php

namespace App\Http\Controllers\Favorites;


use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FavoriteRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class DashFavoriteController
 * @package App\Http\Controllers\Favorites
 */
class DashFavoriteController
{
    /**
     * @var FavoriteRepositoryInterface
     */
    private $favoriteRepository;

    /**
     * DashFavoriteController constructor.
     * @param FavoriteRepositoryInterface $favoriteRepository
     */
    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * @return View
     */
    public function __invoke(): View
    {
        $favorites = $this->favoriteRepository->getUserFavorites(auth()->user()->id);
        $data = compact('favorites');
        return view('pages.internals.favorites.dashboard_favorites', $data);
    }

}
