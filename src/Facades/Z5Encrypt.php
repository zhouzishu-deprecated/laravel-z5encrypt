<?php
namespace Zhouzishu\LaravelZ5Encrypt\Facades;

use Illuminate\Support\Facades\Facade;

class Z5Encrypt extends Facade
{
    /**
     * Return the facade accessor.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'z5encrypt';
    }
}