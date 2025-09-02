<?php

namespace Cocomelon\ActiveState;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ActiveStateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('active', function ($expression) {
            return "<?php echo \Cocomelon\ActiveState\ActiveState::isActive($expression); ?>";
        });
    }
}
