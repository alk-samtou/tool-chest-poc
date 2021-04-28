<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class ApiController implements Destroy
{
    public static function destroy(string $name)
    {
        $name = ucwords(strtolower($name));

        foreach ([
                     app_path("/Http/Controllers/{$name}ApiController.php"),
                 ] as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }

    }
}
