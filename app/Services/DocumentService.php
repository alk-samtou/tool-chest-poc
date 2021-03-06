<?php
namespace App\Services;

use App\Models\Document as Model;
use MetasisMedia\LaravelGenerator\Support\Crud as Base;
class DocumentService extends Base
{
    public function __construct()
    {
        parent::__construct(new Model());
    }

    public function paginate($perPage = 5)
    {
        return $this->model::with('category')->orderBy('title', 'asc')->paginate($perPage);
    }
    public function filteredPaginate($perPage = 5,$categories=[])
    {
        if(empty($categories)){
            return $this->paginate($perPage);
        }
        return $this->model::with('category')->whereIn('document_category_id',$categories)->orderBy('title', 'asc')->paginate($perPage);
    }
}
