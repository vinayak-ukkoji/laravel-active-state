<?php

namespace Cocomelon\ActiveState;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ActiveStateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config file
        $this->publishes([
            __DIR__.'/../config/activestate.php' => config_path('activestate.php'),
        ], 'config');

        // Merge config so package works without publishing config
        $this->mergeConfigFrom(
            __DIR__.'/../config/activestate.php', 'activestate'
        );

        // Register Blade directive @active('route.name')
        Blade::directive('active', function ($expression) {
            $activeClass = config('activestate.active_class', 'active');

            // Return PHP code that checks route and prints the class
            return "<?php echo request()->routeIs($expression) ? '$activeClass' : ''; ?>";
        });
    }

    public function register()
    {
        //
    }
}
