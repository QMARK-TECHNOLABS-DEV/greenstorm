<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Modules\Admins\View\Components\AdminAppLayout;
use App\Modules\Admins\View\Components\EvaluatorAppLayout;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Contracts\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Blade::component('admin-guest-layout', \App\View\Components\AdminGuestLayout::class);
        Blade::component('admin-app-layout', AdminAppLayout::class);
        Blade::component('evaluator-app-layout', EvaluatorAppLayout::class);
    }
}
