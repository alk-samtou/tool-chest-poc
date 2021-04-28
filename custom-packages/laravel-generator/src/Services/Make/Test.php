<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Test implements Make
{
    public static function make($name)
    {

        $template = str_replace(
            [
                '{{name}}',
                '{{namePluralLowerCase}}',
                '{{nameSingularLowerCase}}',
                '{{tableName}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name),
                strtolower(Str::snake(Str::plural($name)))
            ],
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/Test.stub"))
        );
        $path = base_path("tests/Feature/{$name}ServiceTest.php");
        File::put($path, $template);
    }
}
