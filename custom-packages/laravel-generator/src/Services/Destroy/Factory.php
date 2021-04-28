<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Factory implements Destroy
{
    public static function destroy(string $name)
    {
        $name = ucwords(strtolower($name));
        $path = base_path("database/factories/{$name}Factory.php");

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
