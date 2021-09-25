<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

/**
 * Class CategoryRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class CategoryRepositoryEloquent implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryRepositoryEloquent constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function create(Category $category): Category
    {
        $category->save();
        return $category;
    }

    /**
     * @param string $name
     * @return Category|null
     */
    public function findByName(string $name): ?Category
    {
        return $this->category->where('name', '=', $name)->first();
    }
}
