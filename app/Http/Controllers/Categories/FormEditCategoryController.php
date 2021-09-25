<?php

namespace App\Http\Controllers\Categories;


use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class FormEditCategoryController
 * @package App\Http\Controllers\Categories
 */
class FormEditCategoryController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * FormEditCategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param int $categoryID
     * @return View
     */
    public function __invoke(int $categoryID): View
    {
        $category = $this->categoryRepository->findByID($categoryID);
        $data = compact('category');
        return view('pages.internals.categories.edit_category_form', $data);
    }
}
