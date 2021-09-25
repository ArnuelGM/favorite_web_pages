<?php

namespace App\Http\Controllers\Favorites;

use Illuminate\Contracts\View\View;

/**
 * Class FormCreateFavoriteController
 * @package App\Http\Controllers\User
 */
class FormCreateFavoriteController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.internals.favorites.create_favorite_form');
    }
}
