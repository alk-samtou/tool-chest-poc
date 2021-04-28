<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class WebRoute implements Make
{
    public static function make($name)
    {

        $string = 'App\Http\Controllers\\'.$name.'Controller::class';
        $path =  base_path('routes/web.php');
        File::append($path, "\r\n");
        File::append(
            $path,
            'Route::resource("'.Str::plural(Str::kebab($name)).'",'.$string.');'
        );

    }
}
