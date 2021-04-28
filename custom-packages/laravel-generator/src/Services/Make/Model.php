<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Model implements Make
{
    public static function make($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/Model.stub"))
        );
        $path = app_path("/Models/{$name}.php");
        File::put($path, $template);
    }
}
