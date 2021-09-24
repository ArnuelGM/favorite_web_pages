<?php

use App\Http\Controllers\User\FormCreateUserController;
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

Route::get('/', function () {
    return view('welcome');
});

/*
 * Rutas para la gestión de usuario
 */
Route::group(['prefix' => 'register'], function () {
    /* Formulario de registro */
    Route::get('/', [
        'as' => 'register.form',
        'uses' => FormCreateUserController::class
    ]);
});
