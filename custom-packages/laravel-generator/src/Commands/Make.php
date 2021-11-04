<?php

namespace MetasisMedia\LaravelGenerator\Commands;

use Illuminate\Console\Command;
use MetasisMedia\LaravelGenerator\Services\Generator as CrudService;

class Make extends Command
{
    protected $signature = 'generator:make {name} {--only=} {--except=}';

    protected $description = 'Create different types of files based on a model name.';

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
        CrudService::make($name, $intersect);
    }

}
