<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class WebController implements Make
{
    public static function make($name)
    {
        $template = str_replace(
            [
                '{{name}}',
                '{{namePluralLowerCaseDash}}',
                '{{nameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower(Str::kebab(Str::plural($name))),
                strtolower($name)
            ],
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/WebController.stub"))
        );
        $path = app_path("/Http/Controllers/{$name}Controller.php");
        File::put($path, $template);
    }
}
