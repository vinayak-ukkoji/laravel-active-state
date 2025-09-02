# Laravel Active State

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cocomelon/laravel-active-state.svg?style=flat-square)](https://packagist.org/packages/cocomelon/laravel-active-state)
[![License](https://img.shields.io/packagist/l/cocomelon/laravel-active-state.svg?style=flat-square)](https://packagist.org/packages/cocomelon/laravel-active-state)

A simple Laravel package to manage active CSS classes in Blade templates based on current route.

## Features

- Easily add an "active" class to menu items or links in Blade.
- Configurable active CSS class name.
- Supports route pattern matching.

## Installation

You can install the package via Composer:

```bash
composer require cocomelon/laravel-active-state
```
Optionally, publish the config file to customize the active class name:
```
php artisan vendor:publish --tag=config
```

This will create a config file at config/activestate.php.

## Configuration

The config file contains:

```
return [
    /*
    |--------------------------------------------------------------------------
    | CSS class for active state
    |--------------------------------------------------------------------------
    |
    | This class will be output by the @active Blade directive when
    | the current route matches the given pattern.
    |
    */

    'active_class' => 'active',
    ];
```

Change 'active' to whatever CSS class you want.

## Usage

Use the Blade directive @active in your views to add the active class based on current route name.
```
Example:

<li class="@active('home')">Home</li>
<li class="@active('posts.*')">Posts</li>
```

This will output active (or your configured class) if the current route matches.

How it works

Behind the scenes, @active('route.name') translates to:
```
<?php echo request()->routeIs('route.name') ? config('activestate.active_class') : ''; ?>
```
License

The MIT License (MIT). Please see License File for more information.

Made with ❤️ by Cocomelon