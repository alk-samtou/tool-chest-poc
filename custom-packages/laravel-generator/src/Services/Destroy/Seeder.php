<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Seeder implements Destroy
{
    public static function destroy(string $name)
    {
        $name = ucwords(strtolower($name));

        foreach ([
                     base_path("database/seeders/{$name}Seeder.php"),
                 ] as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }

    }
}
