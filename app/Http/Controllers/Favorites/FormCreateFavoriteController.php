<?php

namespace App\Http\Controllers\Favorites;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class FormCreateFavoriteController
 * @package App\Http\Controllers\User
 */
class FormCreateFavoriteController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * FormCreateFavoriteController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categories = $this->categoryRepository->getUserCategories(auth()->user()->id);
        $data = compact('categories');
        return view('pages.internals.favorites.create_favorite_form', $data);
    }
}
