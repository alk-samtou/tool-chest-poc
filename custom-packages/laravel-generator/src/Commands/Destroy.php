<?php

namespace MetasisMedia\LaravelGenerator\Commands;

use Illuminate\Console\Command;
use MetasisMedia\LaravelGenerator\Services\Generator as CrudService;

class Destroy extends Command
{
    protected $signature = 'generator:destroy {name} {--only=} {--except=}';

    protected $description = 'Destroy files generated for specific resources';

    private $types = [
        'ApiController',
        'WebController',
        'Factory',
        'Migration',
        'Model',
        'Request',
        'Resource',
        'ApiRoute',
        'WebRoute',
        'Seeder',
        'Service',
        'Test',
        'View',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $only = $this->option('only');
        $except = $this->option('except');
        $requested = $this->types;
        if(!empty($only)){
            $requested = explode(',', $only);
        }
        $intersect = array_intersect($this->types, $requested);
        if(!empty($except)){
            $exceptions = explode(',', $except);
            foreach($exceptions as $key => $exc){
                foreach($intersect as $item){
                    if($item == $exc){
                        unset($intersect[$key]);
                    }
                }
            }
        }
        CrudService::destroy($name, $intersect);
    }

}
