<?php

namespace App\Http\Controllers\User;


use Illuminate\Contracts\View\View;

/**.
 * Class HomeController
 * @package App\Http\Controllers\User
 */
class HomeController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.internals.home');
    }
}
