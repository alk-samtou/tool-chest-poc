<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\Artisan;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Resource implements Make
{
    public static function make($name)
    {
        $call = 'make:resource '.$name.'Resource';
        Artisan::call($call);
    }
}
