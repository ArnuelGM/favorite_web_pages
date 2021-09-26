<?php

namespace App\Http\Controllers\Favorites;


use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
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
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * FormEditFavoriteController constructor.
     * @param FavoriteRepositoryInterface $favoriteRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        FavoriteRepositoryInterface $favoriteRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->favoriteRepository = $favoriteRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param int $favoriteID
     * @return View
     */
    public function __invoke(int $favoriteID): View
    {
        $favorite = $this->favoriteRepository->findByID($favoriteID);
        $categoriesRelated = $this->favoriteRepository->getCategoriesByFavoriteID($favorite);
        $categories = $this->categoryRepository->getUserCategories(auth()->user()->id);
        $data = compact('favorite', 'categoriesRelated', 'categories');

        return view('pages.internals.favorites.edit_favorite_form', $data);
    }
}
