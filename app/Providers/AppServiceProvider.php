<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Blade::directive('isroute', function ($expression) {
            return "<?php echo Route::is($expression) ? 'nav-link active' : 'nav-link'; ?>";
        });
    }
}
