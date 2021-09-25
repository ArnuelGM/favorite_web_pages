<?php

use App\Http\Controllers\Categories\CreateCategoryController;
use App\Http\Controllers\Categories\DashCategoryController;
use App\Http\Controllers\Categories\DeleteCategoryController;
use App\Http\Controllers\Categories\EditCategoryController;
use App\Http\Controllers\Categories\FormCreateCategoryController;
use App\Http\Controllers\Categories\FormEditCategoryController;
use App\Http\Controllers\Favorites\CreateFavoriteController;
use App\Http\Controllers\Favorites\DashFavoriteController;
use App\Http\Controllers\Favorites\DeleteFavoriteController;
use App\Http\Controllers\Favorites\FormCreateFavoriteController;
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

/* Cerrar Sesión */
Route::get('/logout', [
    'as' => 'user.logout',
    'uses' => LoginUserController::class . '@logout'
]);

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

    /**
     * sistema interno
     */
    Route::group(['prefix' => 'categories'], function () {
        /* Formulario de creación de categoría */
        Route::get('/create', [
            'as' => 'category.create.form',
            'uses' => FormCreateCategoryController::class
        ]);

        /* Creación de categoría */
        Route::post('/create', [
            'as' => 'category.create',
            'uses' => CreateCategoryController::class
        ]);

        /* Dashboard de categoría */
        Route::get('/dashboard', [
            'as' => 'category.dashboard',
            'uses' => DashCategoryController::class
        ]);

        /* Eliminar categoría */
        Route::get('/{categoryID}/delete', [
            'as' => 'category.delete',
            'uses' => DeleteCategoryController::class
        ]);

        /* Formulario de editar categoría */
        Route::get('/{categoryID}/update', [
            'as' => 'category.edit.form',
            'uses' => FormEditCategoryController::class
        ]);

        /* Editar categoría */
        Route::post('/{categoryID}/update', [
            'as' => 'category.edit',
            'uses' => EditCategoryController::class
        ]);
    });

    /**
     * favoritos
     */
    Route::group(['prefix' => 'favorites'], function () {
        /* Formulario de creación de favoritos */
        Route::get('/create', [
            'as' => 'favorite.create.form',
            'uses' => FormCreateFavoriteController::class
        ]);

        /* Creación de categoría */
        Route::post('/create', [
            'as' => 'favorite.create',
            'uses' => CreateFavoriteController::class
        ]);

        /* Dashboard de favoritos */
        Route::get('/dashboard', [
            'as' => 'favorite.dashboard',
            'uses' => DashFavoriteController::class
        ]);

        /* Eliminar favorito */
        Route::get('/{favoriteID}/delete', [
            'as' => 'favorite.delete',
            'uses' => DeleteFavoriteController::class
        ]);
//
//        /* Formulario de editar categoría */
//        Route::get('/{categoryID}/update', [
//            'as' => 'category.edit.form',
//            'uses' => FormEditCategoryController::class
//        ]);
//
//        /* Editar categoría */
//        Route::post('/{categoryID}/update', [
//            'as' => 'category.edit',
//            'uses' => EditCategoryController::class
//        ]);
    });
});

