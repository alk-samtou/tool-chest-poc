<?php

namespace MetasisMedia\LaravelGenerator\Services\Make;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Make;

class Event implements Make
{
    public static function make(string $name)
    {
        $requests = ['create', 'update', 'delete'];
        foreach ($requests as $request) {
            $className = $name.ucwords(strtolower($request)).'Event';
            $template = str_replace(
                ['{{className}}'],
                [$className],
                File::get(resource_path("vendor/metasismedia/laravel-generator/stubs/Event.stub"))
            );
            if (!File::exists($path = app_path('/Events/'))) {
                mkdir($path, 0777, true);
            }
            $filePath = app_path("/Events/{$className}.php");
            File::put($filePath, $template);
        }
    }
}
