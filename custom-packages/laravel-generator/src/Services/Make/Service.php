<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Service implements Make
{
    public static function make(string $name)
    {
        if (!File::exists(app_path('/Services'))) {
            mkdir(app_path('/Services'), 0777, true);
        }

        $template = str_replace(
            ['{{serviceName}}'],
            [$name,],
            File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/Service.stub"))
        );
        $filePath = "/Services/{$name}Service.php";
        File::put(app_path($filePath), $template);
    }
}
