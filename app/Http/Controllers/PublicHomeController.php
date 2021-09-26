<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\FavoriteRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class PublicHomeController
{
    /**
     * @var FavoriteRepositoryInterface
     */
    private $favoriteRepository;

    /**
     * HomeController constructor.
     * @param FavoriteRepositoryInterface $favoriteRepository
     */
    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * @return View
     */
    public function __invoke(): View
    {
        $favorites = $this->favoriteRepository->getPublicFavorites();
        $data = compact('favorites');
        return view('pages.public.home', $data);
    }
}
