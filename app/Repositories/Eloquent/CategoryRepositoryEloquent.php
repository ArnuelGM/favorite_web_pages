<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

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
     * @param int $userID
     * @return Category|null
     */
    public function findByNameAndUserID(string $name, int $userID): ?Category
    {
        return $this->category->where('name', '=', $name)->where('user_id', '=', $userID)->first();
    }

    /**
     * @param int $userID
     * @return Collection
     */
    public function getUserCategories(int $userID): Collection
    {
        return $this->category->where('user_id', '=', $userID)->get();
    }

    /**
     * @param int $categoryID
     * @return bool
     */
    public function delete(int $categoryID): bool
    {
        $register = $this->category->findOrFail($categoryID);
        return $register->delete();
    }

    /**
     * @param int $categoryID
     * @return Category|null
     */
    public function findByID(int $categoryID): ?Category
    {
        return $this->category->find($categoryID);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function edit(Category $category): Category
    {
        $category->save();
        return $category;
    }
}
