<?php

namespace App\Http\Controllers\User;


use Illuminate\Contracts\View\View;

/**
 * Class FormCreateUserController
 * @package App\Http\Controllers\User
 */
class FormCreateUserController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.userRegister.register_form');
    }
}
