<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class ApiController implements Make
{
    public static function make($name)
    {
        $template = str_replace(
            [
                '{{name}}',
                '{{namePluralLowerCase}}',
                '{{nameSingularLowerCase}}',
            ],
            [
                $name,
                Str::kebab(Str::plural($name)),
                strtolower($name)
            ],
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/ApiController.stub"))
        );
        $path = app_path("/Http/Controllers/{$name}ApiController.php");
        File::put($path, $template);
    }
}
