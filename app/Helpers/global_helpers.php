<?php

/** Sidebar Item Active */
if (!function_exists('sidebarItemActive')) {
    function sidebarItemActive(array $routes)
    {

        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
    }
}

if(!function_exists('user')) {
    function user() {
        return auth('web')->user();
    }
}