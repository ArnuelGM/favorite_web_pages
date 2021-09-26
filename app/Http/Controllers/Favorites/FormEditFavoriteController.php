<?php

namespace App\Http\Controllers\Favorites;


use App\Repositories\Contracts\FavoriteRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class FormEditFavoriteController
 * @package App\Http\Controllers\Categories
 */
class FormEditFavoriteController
{
    /**
     * @var FavoriteRepositoryInterface
     */
    private $favoriteRepository;

    /**
     * FormEditFavoriteController constructor.
     * @param FavoriteRepositoryInterface $favoriteRepository
     */
    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * @param int $favoriteID
     * @return View
     */
    public function __invoke(int $favoriteID): View
    {
        $favorite = $this->favoriteRepository->findByID($favoriteID);
        $data = compact('favorite');
        return view('pages.internals.favorites.edit_favorite_form', $data);
    }
}
