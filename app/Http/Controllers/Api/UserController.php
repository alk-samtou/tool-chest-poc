<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserCreateRequest as CreateRequest;
use App\Http\Requests\UserDeleteRequest as DeleteRequest;
use App\Http\Requests\UserUpdateRequest as UpdateRequest;
use App\Http\Resources\UserResource as ApiResource;
use App\Models\User as Model;
use App\Services\UserService as Service;
use Illuminate\Http\Response;
use MetasisMedia\LaravelGenerator\Interfaces\Crud;

class UserController extends Controller
{
    protected Crud $service;

    protected int $paginateCount = 10;

    public function __construct(Service $service, Model $model)
    {
        $this->service = new Service($model);
    }

    public function destroy(DeleteRequest $request, $id)
    {
        $data = $request->validated();

        if ($this->service->delete($id)) {
            return response(['data' => null], 204);
        }

        return response(['data' => null], 500);
    }

    public function index()
    {
        $data = $this->service->paginate($this->paginateCount);
        return response($data, 200);
    }

    public function show($id)
    {
        if ($record = $this->service->get($id)) {
            return response(new ApiResource($record), 200);
        }

        return response(['data' => null], 404);
    }

    public function store(CreateRequest $request): Response
    {
        $data = $request->validated();
        $record = $this->service->create($data);
        return response(new ApiResource($record), 201);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($this->service->update($id, $data)) {
            return $this->show($id);
        }

        return response(['data' => null], 500);
    }
}
