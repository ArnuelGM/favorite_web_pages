<?php

namespace App\Http\Controllers\Favorites;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FavoriteRepositoryInterface;
use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class DeleteFavoriteController
 * @package App\Http\Controllers\Categories
 */
class DeleteFavoriteController
{
    /**
     * @var FavoriteRepositoryInterface
     */
    private $favoriteRepository;

    /**
     * DeleteFavoriteController constructor.
     * @param FavoriteRepositoryInterface $favoriteRepository
     */
    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * @param int $favoriteID
     * @return RedirectResponse
     */
    public function __invoke(int $favoriteID): RedirectResponse
    {
        try {
            $this->favoriteRepository->delete($favoriteID);
            session()->flash('success', 'Favorito eliminado con éxito');
            return redirect()->route('favorite.dashboard');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors([
                'msg' => 'Error al eliminar el favorito'
            ]);
        }
    }
}
