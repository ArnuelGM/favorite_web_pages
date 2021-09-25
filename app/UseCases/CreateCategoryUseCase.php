<?php

namespace App\UseCases;

use App\Exceptions\CreateCategoryException;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\UseCases\Contracts\CreateCategoryUseCaseInterface;

/**
 * Class CreateCategoryUseCase
 * @package App\UseCases
 */
class CreateCategoryUseCase implements CreateCategoryUseCaseInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CreateCategoryUseCase constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param string $name
     * @param string $userID
     * @return Category
     * @throws CreateCategoryException
     */
    public function handle(string $name, string $userID): Category
    {
        $category = new Category();
        $category->name = $name;
        $category->user_id = $userID;

        $existCategory = $this->categoryRepository->findByName($category->name);
        if (!empty($existCategory)) {
            throw new CreateCategoryException('Esta categoría ya existe');
        }

        return $this->categoryRepository->create($category);
    }
}
