<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Service implements Destroy
{
    public static function destroy(string $name)
    {
        $name = ucwords(strtolower($name));
        $path = app_path("/Services/{$name}Service.php");
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
