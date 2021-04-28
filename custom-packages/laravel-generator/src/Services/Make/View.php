<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class View implements Make
{
    public static function make($name)
    {
        $name = Str::kebab(Str::plural($name));
        $folderPath = 'views/'.$name;
        $views = [
            'create' => 'create.blade.php',
            'show'   => 'show.blade.php',
            'index'  => 'index.blade.php',
            'update' => 'update.blade.php',
        ];

        if (!File::exists(resource_path($folderPath))) {
            mkdir(resource_path($folderPath), 0777, true);
        }

        foreach ($views as $stub => $fileName) {
            $viewPath = resource_path($folderPath.'/'.$fileName);
            $template = str_replace(
                ['{{name}}'],
                [$name,],
                File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/views/".$stub.".stub"))
            );
            if (!File::exists($viewPath)) {
                File::put($viewPath, $template);
            }
        }
    }
}
