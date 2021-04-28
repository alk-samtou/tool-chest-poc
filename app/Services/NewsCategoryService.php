<?php
namespace App\Services;

use App\Models\NewsCategory as Model;
use MetasisMedia\LaravelGenerator\Support\Crud as Base;
class NewsCategoryService extends Base
{
    public function __construct()
    {
        parent::__construct(new Model());
    }

}
