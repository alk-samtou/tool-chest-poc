<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Requests\DocumentCategoryCreateRequest as CreateRequest;
use App\Http\Requests\DocumentCategoryDeleteRequest as DeleteRequest;
use App\Http\Requests\DocumentCategoryUpdateRequest as UpdateRequest;
use App\Http\Resources\DocumentCategoryResource as ApiResource;
use App\Models\DocumentCategory as Model;
use App\Services\DocumentCategoryService as Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use MetasisMedia\LaravelGenerator\Interfaces\Crud;

class DocumentCategoryController extends Controller
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

    public function index(Request $request)
    {
        $perPage = $request = $request->input('perPage',$this->paginateCount);
        $data = $this->service->model::orderBy('name')
            ->paginate($perPage)
            ->withQueryString();

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
