<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class ApiRoute implements Make
{
    public static function make($name)
    {

        $string = 'App\Http\Controllers\\'.$name.'ApiController::class';
        $path =  base_path('routes/api.php');
        File::append($path, "\r\n");
        File::append(
           $path,
            'Route::apiResource("'.Str::plural(Str::kebab($name)).'",'.$string.');'
        );

    }
}
