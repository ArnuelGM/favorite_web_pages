<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
use Illuminate\Support\Collection;

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

    /**
     * @param int $userID
     * @return Collection
     */
    public function getUserCategories(int $userID): Collection;
}
