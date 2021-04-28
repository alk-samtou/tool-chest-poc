<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class View implements Destroy
{
    public static function destroy(string $name)
    {
        $name = Str::kebab(Str::plural($name));
        $folderPath = 'views/'.$name;
        File::deleteDirectory(resource_path($folderPath));
    }
}
