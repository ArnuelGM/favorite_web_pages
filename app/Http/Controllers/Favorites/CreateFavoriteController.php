<?php

namespace App\Http\Controllers\Favorites;

use App\Exceptions\CreateCategoryException;
use App\Exceptions\CreateFavoriteException;
use App\Http\Requests\CreateCategoryFormRequest;
use App\Http\Requests\CreateFavoriteFormRequest;
use App\UseCases\Contracts\CreateCategoryUseCaseInterface;
use App\UseCases\Contracts\CreateFavoriteUseCaseInterface;
use Exception;

/**
 * Class CreateFavoriteController
 * @package App\Http\Controllers\Categories
 */
class CreateFavoriteController
{
    /**
     * @var CreateFavoriteUseCaseInterface
     */
    private $createFavoriteUseCase;

    /**
     * CreateFavoriteController constructor.
     * @param CreateFavoriteUseCaseInterface $createFavoriteUseCase
     */
    public function __construct(CreateFavoriteUseCaseInterface $createFavoriteUseCase)
    {
        $this->createFavoriteUseCase = $createFavoriteUseCase;
    }

    /**
     * @param CreateFavoriteFormRequest $request
     */
    public function __invoke(CreateFavoriteFormRequest $request)
    {
        $error = null;
        try {
            $favorite = $this->createFavoriteUseCase->handle(
                $request->get('title'),
                $request->get('url'),
                $request->get('description'),
                $request->get('visibility'),
                auth()->user()->id
            );

            session()->flash('success', 'Favorito creado con éxito');
            return redirect()->route('favorite.dashboard');
        } catch (CreateFavoriteException $exception) {
            $error = $exception->getMessage();
        } catch (Exception $exception) {
            $error = 'Error al crear el registro favorito';
        }

        return redirect()->back()->withErrors([
            'msg' => $error
        ]);
    }
}
