<?php

namespace MetasisMedia\LaravelGenerator\Support;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Crud implements \MetasisMedia\LaravelGenerator\Interfaces\Crud
{
    public Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model::all();
    }

    public function paginate($perPage=5){
        return $this->model::paginate($perPage);
    }

    public function create(array $data): Model
    {
        $model = $this->model();
        return $model::create($data);
    }

    public function delete($id): bool
    {
        return $this->model::destroy($id);
    }

    public function get($id): Model
    {
        $model = $this->model();
        return $model::findOrFail($id);
    }

    public function model(): Model
    {
        return $this->model;
    }

    public function update($id, array $data): bool
    {
        $model = $this->model();

//        $new_data = array_intersect_key($data,
//            array_flip( /* to be extracted */
//                $model->fillable
//            )
//        );
        return $model::where('id', $id)->update($data);
    }
}
