<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class ApiRoute implements Destroy
{
    public static function destroy(string $name)
    {
        $apiFile = base_path('routes/api.php');
        $apiFileContents = File::get($apiFile);
        $apiLine = 'Route::apiResource(\''.Str::plural(strtolower($name))."', '{$name}ApiController');";
        $apiFileContents = str_replace($apiLine, '', $apiFileContents);
        File::put($apiFile, $apiFileContents);
    }
}
