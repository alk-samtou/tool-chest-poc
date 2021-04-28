<?php
namespace App\Services;

use App\Models\DocumentCategory as Model;
use MetasisMedia\LaravelGenerator\Support\Crud as Base;
class DocumentCategoryService extends Base
{
    public function __construct()
    {
        parent::__construct(new Model());
    }

}
