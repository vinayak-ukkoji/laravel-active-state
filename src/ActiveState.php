<?php

namespace Cocomelon\ActiveState;

class ActiveState
{
    public static function isActive(array|string $routes, string $activeClass = 'active'): string
    {
        $routes = (array) $routes;

        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'class="' . $activeClass . '"';
            }
        }

        return '';
    }
}