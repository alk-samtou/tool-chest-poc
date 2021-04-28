<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Request implements Make
{
    public static function make($name)
    {
        $requests = ['create', 'update', 'delete'];
        foreach ($requests as $request) {
            $className = $name.ucwords(strtolower($request)).'Request';
            $template = str_replace(
                ['{{requestClass}}'],
                [$className],
                File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/Request.stub"))
            );
            if (!File::exists($path = app_path('/Http/Requests/'))) {
                mkdir($path, 0777, true);
            }
            $filePath = app_path("/Http/Requests/{$className}.php");
            File::put($filePath, $template);
        }
    }
}
