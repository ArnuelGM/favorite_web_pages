<?php

namespace App\UseCases\Contracts;

use App\Exceptions\EditFavoriteException;
use App\Models\Category;

/**
 * Interface EditCategoryUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface EditCategoryUseCaseInterface
{
    /**
     * @param int $categoryID
     * @param string $name
     * @param string $userID
     * @return Category
     * @throws EditFavoriteException
     */
    public function handle(int $categoryID, string $name, string $userID): Category;
}
