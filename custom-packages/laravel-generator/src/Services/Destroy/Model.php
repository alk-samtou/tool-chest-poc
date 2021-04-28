<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Model implements Destroy
{
    public static function destroy(string $name)
    {
        $name = ucwords(strtolower($name));
        $path = app_path("/Models/{$name}.php");
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
