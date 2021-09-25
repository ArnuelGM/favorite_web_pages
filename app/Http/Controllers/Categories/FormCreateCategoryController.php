<?php

namespace App\Http\Controllers\Categories;


use Illuminate\Contracts\View\View;

/**
 * Class FormCreateCategoryController
 * @package App\Http\Controllers\User
 */
class FormCreateCategoryController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.internals.categories.create_category_form');
    }
}
