<?php

namespace App\Http\Controllers\User;


/**
 * Class FormLoginController
 * @package App\Http\Controllers\User
 */
class FormLoginController
{
    /**
     *
     */
    public function __invoke(): View
    {
        return view('login');
    }
}
