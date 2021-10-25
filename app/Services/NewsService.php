<?php
namespace App\Services;

use App\Models\News as Model;
use MetasisMedia\LaravelGenerator\Support\Crud as Base;
class NewsService extends Base
{
    public function __construct()
    {
        parent::__construct(new Model());
    }

    public function paginate($perPage=5){
        return $this->model::with('category')->with('author')->paginate($perPage);
    }
}
