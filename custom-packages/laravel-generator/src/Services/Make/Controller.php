<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Controller implements Make
{
    public static function make($name)
    {
        self::apiController($name);
        self::viewController($name);
    }

    private static function apiController($name)
    {
        $template = str_replace(
            [
                '{{name}}',
                '{{namePluralLowerCase}}',
                '{{nameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/ApiController.stub"))
        );
        $path = app_path("/Http/Controllers/{$name}ApiController.php");
        File::put($path, $template);
    }

    private static function viewController($name)
    {
        $template = str_replace(
            [
                '{{name}}',
                '{{namePluralLowerCaseDash}}',
                '{{nameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            File::get(resource_path("vendor/metasismedia/laravel-generator/Controller.stub"))
        );
        $path = app_path("/Http/Controllers/{$name}Controller.php");
        File::put($path, $template);
    }
}
