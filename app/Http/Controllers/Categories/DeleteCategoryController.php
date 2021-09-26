<?php

namespace App\Http\Controllers\Categories;


use App\Repositories\Contracts\CategoryRepositoryInterface;
use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class DeleteCategoryController
 * @package App\Http\Controllers\Categories
 */
class DeleteCategoryController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * DashCategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param int $categoryID
     * @return RedirectResponse
     */
    public function __invoke(int $categoryID): RedirectResponse
    {
        try {
            $this->categoryRepository->delete($categoryID);
            session()->flash('success', 'Categoría eliminada con éxito');
            return redirect()->route('category.dashboard');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors([
                'msg' => 'Error al eliminar la categoría'
            ]);
        }
    }
}
