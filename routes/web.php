<?php

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\FormCreateUserController;
use App\Http\Controllers\User\FormLoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Rutas para la gestión de usuario
 */
Route::group(['prefix' => 'register'], function () {
    /* Formulario de registro */
    Route::get('/', [
        'as' => 'register.form',
        'uses' => FormCreateUserController::class
    ]);

    /* creación de registro */
    Route::post('/create', [
        'as' => 'create.register',
        'uses' => CreateUserController::class
    ]);
});

Route::group(['prefix' => 'login'], function () {
    /* Formulario de ingreso */
    Route::get('/', [
        'as' => 'login.form',
        'uses' => FormLoginController::class
    ]);

    /* petición de login */
    Route::post('', [
        'as' => 'login',
        'uses' => LoginUserController::class
    ]);
});

/**
 * sistema interno
 */
Route::group(['middleware' => 'auth.basic'], function () {
    /* pagina de inicio de usuarios autenticados */
    Route::get('home/', [
        'as' => 'user.home',
        'uses' => HomeController::class
    ]);
});
