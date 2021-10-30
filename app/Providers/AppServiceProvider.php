<?php

namespace App\Providers;

use App\Http\Repository\Model\impl\UserReposirotyImpl;
use App\Http\Repository\Model\UserRepository;
use App\Http\Repository\ModelRepository\impl\UserRepositoryImpl;
use App\Http\Repository\ModelRepository\UserRepositoryInterface;
use App\Http\Service\impl\userSerivceImpl;
use App\Http\Service\userServices;
use App\Http\Services\impl\userServceImpl;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepository::class,
            UserReposirotyImpl::class
        );
        $this->app->singleton(
            \App\Http\Services\userServices::class,
            userServceImpl::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
