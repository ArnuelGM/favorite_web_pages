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
     * @param int $userID
     * @return Category|null
     */
    public function findByNameAndUserID(string $name, int $userID): ?Category;

    /**
     * @param int $userID
     * @return Collection
     */
    public function getUserCategories(int $userID): Collection;

    /**
     * @param int $categoryID
     * @return bool
     */
    public function delete(int $categoryID): bool;

    /**
     * @param int $categoryID
     * @return Category|null
     */
    public function findByID(int $categoryID): ?Category;

    /**
     * @param Category $category
     * @return Category
     */
    public function edit(Category $category): Category;
}
