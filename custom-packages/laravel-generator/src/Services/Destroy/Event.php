<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use Illuminate\Support\Facades\File;
use MetasisMedia\LaravelGenerator\Interfaces\Destroy;

class Event implements Destroy
{
    public static function destroy(string $name)
    {
        $name = ucwords(strtolower($name));
        $requests = ['create', 'update', 'delete'];
        foreach ($requests as $request) {
            $className = $name.ucwords(strtolower($request)).'Event';
            $path = app_path("/Events/{$className}.php");
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }
}
