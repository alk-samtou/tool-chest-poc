<?php

namespace MetasisMedia\LaravelGenerator\Services\Destroy;

use MetasisMedia\LaravelGenerator\Interfaces\Destroy;
use Illuminate\Support\Facades\File;

class Request implements Destroy
{
    public static function destroy(string $name)
    {
        $name = ucwords(strtolower($name));
        $requests = ['create', 'update', 'delete'];
        foreach ($requests as $request) {
            $className = $name.ucwords(strtolower($request)).'Request';
            $path = app_path("/Http/Requests/{$className}.php");
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }
}
