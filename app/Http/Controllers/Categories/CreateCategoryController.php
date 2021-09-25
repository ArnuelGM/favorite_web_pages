<?php

namespace App\Http\Controllers\Categories;

use App\Exceptions\CreateCategoryException;
use App\Http\Requests\CreateCategoryFormRequest;
use App\UseCases\Contracts\CreateCategoryUseCaseInterface;
use Exception;

/**
 * Class CreateCategoryController
 * @package App\Http\Controllers\Categories
 */
class CreateCategoryController
{
    /**
     * @var CreateCategoryUseCaseInterface
     */
    private $createCategoryUseCase;

    /**.
     * CreateCategoryController constructor.
     * @param CreateCategoryUseCaseInterface $createCategoryUseCase
     */
    public function __construct(CreateCategoryUseCaseInterface $createCategoryUseCase)
    {
        $this->createCategoryUseCase = $createCategoryUseCase;
    }

    /**
     * @param CreateCategoryFormRequest $request
     */
    public function __invoke(CreateCategoryFormRequest $request)
    {
        $error = null;
        try {
            $category = $this->createCategoryUseCase->handle(
                $request->get('name'),
                auth()->user()->id
            );

            session()->flash('success', 'Categoría creada con éxito');
            return redirect()->route('category.dashboard');
        } catch (CreateCategoryException $exception) {
            $error = $exception->getMessage();
        } catch (Exception $exception) {
            $error = 'Error no controlado';
        }

        return redirect()->back()->withErrors([
            'msg' => $error
        ]);
    }
}
