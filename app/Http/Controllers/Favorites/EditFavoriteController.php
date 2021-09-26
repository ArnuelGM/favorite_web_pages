<?php

namespace App\Http\Controllers\Favorites;

use App\Exceptions\CreateCategoryException;
use App\Exceptions\EditFavoriteException;
use App\Http\Requests\CreateCategoryFormRequest;
use App\Http\Requests\CreateFavoriteFormRequest;
use App\UseCases\Contracts\CreateCategoryUseCaseInterface;
use App\UseCases\Contracts\EditCategoryUseCaseInterface;
use App\UseCases\Contracts\EditFavoriteUseCaseInterface;
use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class EditFavoriteController
 * @package App\Http\Controllers\Categories
 */
class EditFavoriteController
{
    /**
     * @var EditFavoriteUseCaseInterface
     */
    private $editFavoriteUseCase;

    /**
     * EditFavoriteController constructor.
     * @param EditFavoriteUseCaseInterface $editFavoriteUseCase
     */
    public function __construct(EditFavoriteUseCaseInterface $editFavoriteUseCase)
    {
        $this->editFavoriteUseCase = $editFavoriteUseCase;
    }

    /**
     * @param CreateFavoriteFormRequest $request
     * @param int $favoriteID
     * @return RedirectResponse
     */
    public function __invoke(CreateFavoriteFormRequest $request, int $favoriteID): RedirectResponse
    {
        $error = null;
        try {
            $favorite = $this->editFavoriteUseCase->handle(
                $favoriteID,
                $request->get('title'),
                $request->get('url'),
                $request->get('description'),
                $request->get('visibility'),
                auth()->user()->id
            );

            session()->flash('success', 'Favorito editado con éxito');
            return redirect()->route('favorite.dashboard');
        } catch (EditFavoriteException $exception) {
            $error = $exception->getMessage();
        } catch (Exception $exception) {
            $error = 'Error al editar el favorito!';
        }

        return redirect()->back()->withErrors([
            'msg' => $error
        ]);
    }
}
