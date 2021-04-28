<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Route implements Make
{
    public static function make($name)
    {
        ApiRoute::make($name);
        WebRoute::make($name);
    }
}
