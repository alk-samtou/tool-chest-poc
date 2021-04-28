<?php

namespace MetasisMedia\LaravelGenerator\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Crud
{
    /**
     * Get All
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Create record
     * @param  array  $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Delete record
     * @param $id
     * @return bool
     */
    public function delete($id): bool;

    /**
     * Get record by id
     * @param $id
     * @return false|Model
     */
    public function get($id): false|Model;

    /**
     * Get the model
     * @return Model
     */
    public function model(): Model;

    /**
     * Update a record
     * @param $id
     * @param  array  $data
     * @return bool
     */
    public function update($id, array $data): bool;
}
