<?php

namespace MetasisMedia\LaravelGenerator\Services;

class Generator
{
    public static function destroy($name, $types)
    {
        foreach ($types as $type) {
            $class = "\MetasisMedia\LaravelGenerator\Services\Destroy\\$type";
            if(class_exists($class)){
                $class::destroy($name);
            }
        }
    }

    public static function make($name, $types)
    {
        foreach ($types as $type) {
            $class = "\MetasisMedia\LaravelGenerator\Services\Make\\$type";
            if(class_exists($class)){
                $class::make($name);
            }
        }
    }
}
