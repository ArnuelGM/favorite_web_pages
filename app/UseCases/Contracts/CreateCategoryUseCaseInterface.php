<?php

namespace App\UseCases\Contracts;

use App\Exceptions\CreateCategoryException;
use App\Models\Category;

/**
 * Interface CreateCategoryUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface CreateCategoryUseCaseInterface
{
    /**
     * @param string $name
     * @param string $userID
     * @return Category
     * @throws CreateCategoryException
     */
    public function handle(string $name, string $userID): Category;
}
