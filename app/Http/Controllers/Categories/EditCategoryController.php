<?php

namespace App\Http\Controllers\Categories;

use App\Exceptions\EditCategoryException;
use App\Http\Requests\CreateCategoryFormRequest;
use App\UseCases\Contracts\EditCategoryUseCaseInterface;
use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class EditCategoryController
 * @package App\Http\Controllers\Categories
 */
class EditCategoryController
{
    /**
     * @var EditCategoryUseCaseInterface
     */
    private $editCategoryUseCase;

    /**
     * EditCategoryController constructor.
     * @param EditCategoryUseCaseInterface $editCategoryUseCase
     */
    public function __construct(EditCategoryUseCaseInterface $editCategoryUseCase)
    {
        $this->editCategoryUseCase = $editCategoryUseCase;
    }

    /**
     * @param CreateCategoryFormRequest $request
     * @param int $categoryID
     * @return RedirectResponse
     */
    public function __invoke(CreateCategoryFormRequest $request, int $categoryID): RedirectResponse
    {
        $error = null;
        try {
            $category = $this->editCategoryUseCase->handle(
                $categoryID,
                $request->get('name'),
                auth()->user()->id
            );

            session()->flash('success', 'Categoría editada con éxito');
            return redirect()->route('category.dashboard');
        } catch (EditCategoryException $exception) {
            $error = $exception->getMessage();
        } catch (Exception $exception) {
            $error = 'Error al editar la categoría!';
        }

        return redirect()->back()->withErrors([
            'msg' => $error
        ]);
    }
}
