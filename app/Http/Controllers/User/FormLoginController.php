<?php

namespace App\Http\Controllers\User;

use Illuminate\Contracts\View\View;

/**
 * Class FormLoginController
 * @package App\Http\Controllers\User
 */
class FormLoginController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.userLogin.login_form');
    }
}
