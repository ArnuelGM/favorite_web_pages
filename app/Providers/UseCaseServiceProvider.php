<?php

namespace App\Providers;

use App\UseCases\Contracts\CreateUserUseCaseInterface;
use App\UseCases\Contracts\LoginUserUseCaseInterface;
use App\UseCases\CreateUserUseCase;
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
