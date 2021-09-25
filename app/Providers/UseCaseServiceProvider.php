<?php

namespace App\Providers;

use App\UseCases\Contracts\CreateCategoryUseCaseInterface;
use App\UseCases\Contracts\CreateFavoriteUseCaseInterface;
use App\UseCases\Contracts\CreateUserUseCaseInterface;
use App\UseCases\Contracts\EditCategoryUseCaseInterface;
use App\UseCases\Contracts\LoginUserUseCaseInterface;
use App\UseCases\CreateCategoryUseCase;
use App\UseCases\CreateFavoriteUseCase;
use App\UseCases\CreateUserUseCase;
use App\UseCases\EditCategoryUseCase;
use App\UseCases\LoginUserUseCase;
use Illuminate\Support\ServiceProvider;

/**
 * Class UseCaseServiceProvider
 * @package App\Providers
 */
class UseCaseServiceProvider extends ServiceProvider
{
    /**
     * @var string[]
     */
    public $bindings = [
        CreateUserUseCaseInterface::class => CreateUserUseCase::class,
        LoginUserUseCaseInterface::class => LoginUserUseCase::class,
        CreateCategoryUseCaseInterface::class => CreateCategoryUseCase::class,
        EditCategoryUseCaseInterface::class => EditCategoryUseCase::class,
        CreateFavoriteUseCaseInterface::class => CreateFavoriteUseCase::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
