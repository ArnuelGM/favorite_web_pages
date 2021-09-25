<?php

namespace App\Http\Controllers\Categories;


use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class DashCategoryController
 * @package App\Http\Controllers\Categories
 */
class DashCategoryController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * DashCategoryController constructor.
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
        return view('pages.internals.categories.dashboard_categories');
    }

}
