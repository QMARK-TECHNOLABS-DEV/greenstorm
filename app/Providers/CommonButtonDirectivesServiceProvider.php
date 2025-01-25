<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class CommonButtonDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('commonButtonDirective', function ($expression) {
            // You can call a function or perform any logic here
            return "<?php echo commonButtonText($expression); ?>";
        });
    }
}
