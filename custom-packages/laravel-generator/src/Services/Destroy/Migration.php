<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Migration implements Destroy
{
    public static function destroy(string $name)
    {

        $path = base_path("database/migrations");
        foreach (scandir($path) as $file) {
            if (str_contains($file, 'create_'.Str::snake(Str::plural($name)).'_table.php')) {
                $filePath = $path.'/'.$file;
                File::delete($filePath);
            }
        }
    }
}
