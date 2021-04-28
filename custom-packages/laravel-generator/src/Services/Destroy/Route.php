<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Route implements Destroy
{
    public static function destroy(string $name)
    {
        $apiFile = base_path('routes/api.php');
        $webFile = base_path('routes/web.php');

        $apiFileContents = File::get($apiFile);
        $webFileContents = File::get($webFile);

        $apiLine = 'Route::apiResource(\''.Str::plural(strtolower($name))."', '{$name}ApiController');";
        $webLine = 'Route::resource(\''.Str::plural(strtolower($name))."', '{$name}Controller');";

        $apiFileContents = str_replace($apiLine, '', $apiFileContents);
        $webFileContents = str_replace($webLine, '', $webFileContents);

        File::put($apiFile, $apiFileContents);
        File::put($webFile, $webFileContents);

    }
}
