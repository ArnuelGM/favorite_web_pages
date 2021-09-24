<?php

namespace App\Providers;

use App\UseCases\Contracts\CreateUserUseCaseInterface;
use App\UseCases\CreateUserUseCase;
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
