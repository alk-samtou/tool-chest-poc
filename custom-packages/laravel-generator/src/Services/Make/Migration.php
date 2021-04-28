<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Migration implements Make
{
    public static function make($name)
    {
        $call = 'make:migration create_'.strtolower(Str::snake(Str::plural($name))).'_table --create='.strtolower(Str::snake(Str::plural($name)));
        Artisan::call($call);
    }
}
