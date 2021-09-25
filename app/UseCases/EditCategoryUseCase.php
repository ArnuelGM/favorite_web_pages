<?php

namespace App\UseCases;

use App\Exceptions\CreateCategoryException;
use App\Exceptions\EditCategoryException;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\UseCases\Contracts\EditCategoryUseCaseInterface;

/**
 * Class EditCategoryUseCase
 * @package App\UseCases
 */
class EditCategoryUseCase implements EditCategoryUseCaseInterface
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
     * @inheritDoc
     */
    public function handle(int $categoryID, string $name, string $userID): Category
    {
        $category = $this->categoryRepository->findByID($categoryID);
        if (empty($category)) {
            throw new EditCategoryException('Categoría no encontrada!');
        }

        if ($category->name == ucwords(strtolower($name))) {
            throw new EditCategoryException('Esta categoría ya existe!');
        }

        if ($category->user_id != $userID) {
            throw new EditCategoryException('Usted no puede editar esta categoría!');
        }

        $category->name = $name;
        return $this->categoryRepository->edit($category);
    }
}
