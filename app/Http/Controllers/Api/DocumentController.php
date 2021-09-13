<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Requests\DocumentCreateRequest as CreateRequest;
use App\Http\Requests\DocumentDeleteRequest as DeleteRequest;
use App\Http\Requests\DocumentUpdateRequest as UpdateRequest;
use App\Http\Resources\DocumentResource as ApiResource;
use App\Models\Document as Model;
use App\Services\DocumentService as Service;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use MetasisMedia\LaravelGenerator\Interfaces\Crud;
use Illuminate\Http\Request;
class DocumentController extends Controller
{
    protected Crud $service;

    protected int $paginateCount = 15;

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
        $categories = $request->query('category',false);
        if($categories){
            $categories = explode(',',$categories);
            $data = $this->service->filteredPaginate($this->paginateCount,$categories);
        } else {
            $data = $this->service->paginate($this->paginateCount);
        }

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
        $requestData = $request->validated();


        $data = [];
        $data['added_by_user'] = Auth::user()->id;
        $data['document_category_id'] = $requestData['document_category_id'];
        $data['document_permission'] = (int)$requestData['document_permission'];
        $data['password'] = $requestData['password'];
        $data['title'] = $requestData['title'];
        $data['description'] = $requestData['description'];
        $data['is_featured'] = $requestData['is_featured'];

        if ($file = $request->file('attachment')) {
            $fileNameParts = explode('.',$file->getClientOriginalName());
            $path = $request->file('attachment')->storeAs('docs',time() . '.' . $file->getClientOriginalExtension());
            $parts = explode('/', $path);
            $data['original_file_name'] = $file->getClientOriginalName();
            $data['file_name'] = end($parts);
            $data['file_path'] = $path;

        }

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
