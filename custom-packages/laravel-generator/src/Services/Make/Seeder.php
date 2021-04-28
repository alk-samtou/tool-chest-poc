<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Seeder implements Make
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
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/Seeder.stub"))
        );
        $path = base_path("/database/Seeders/{$name}Seeder.php");
        File::put($path, $template);
    }
}
