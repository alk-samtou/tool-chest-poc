<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Factory implements Make
{
    public static function make(string $name)
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
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/Factory.stub"))
        );
        $path = base_path("database/factories/{$name}Factory.php");
        File::put($path, $template);
    }
}
