<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class WebRoute implements Destroy
{
    public static function destroy(string $name)
    {
        $webFile = base_path('routes/web.php');
        $webFileContents = File::get($webFile);
        $webLine = 'Route::resource(\''.Str::plural(strtolower($name))."', '{$name}Controller');";
        $webFileContents = str_replace($webLine, '', $webFileContents);
        File::put($webFile, $webFileContents);
    }
}
