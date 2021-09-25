<?php

namespace App\UseCases\Contracts;

use App\Exceptions\CreateCategoryException;
use App\Exceptions\EditCategoryException;
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
     * @throws EditCategoryException
     */
    public function handle(int $categoryID, string $name, string $userID): Category;
}
