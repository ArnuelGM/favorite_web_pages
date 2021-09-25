<?php

namespace App\Repositories\Contracts;

use App\Models\Category;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface CategoryRepositoryInterface
{
    /**
     * @param Category $category
     * @return Category
     */
    public function create(Category $category): Category;

    /**
     * @param string $name
     * @return Category|null
     */
    public function findByName(string $name): ?Category;
}
