<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Test implements Destroy
{
    public static function destroy(string $name)
    {
        $path = base_path("/tests/Feature/{$name}ServiceTest.php");

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
