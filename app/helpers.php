<?php


use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $name, string $active = 'active')
    {
        return Route::is($name) ? $active : '';
    }
}

if (!function_exists('alert')) {
    function alert(string $value)
    {
        return  session(['alert' => $value]);
    }
}

if (!function_exists('__money')) {
    function __money(string $amount, string $currency_id): string
    {
        $value = number_format($amount, 2, '.', ' ');
        return "{$value} {$currency_id}";
    }
}
