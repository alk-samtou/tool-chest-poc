<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCreateRequest as CreateRequest;
use App\Http\Requests\NewsDeleteRequest as DeleteRequest;
use App\Http\Requests\NewsUpdateRequest as UpdateRequest;
use App\Models\News as Model;
use App\Services\NewsService as Service;
use MetasisMedia\LaravelGenerator\Interfaces\Crud;

class NewsController extends Controller
{
    protected Crud $service;
    protected string $routeName = 'news';
    protected int $paginateCount = 10;

    public function __construct(Service $service, Model $model)
    {
        $this->service = new Service($model);
    }

    public function create()
    {
        return view($this->routeName.'.create');
    }

    public function destroy(DeleteRequest $request, $id)
    {
        if ($this->service->delete($id)) {
            return redirect(route($this->routeName.'.index'))->with('message', 'deleted');
        }

        return abort(404);
    }

    public function edit($id)
    {
        if ($record = $this->service->get($id)) {
            return view($this->routeName.'.edit')->with('record', $record);
        }

        return abort(404);
    }

    public function index()
    {
        $records = $this->service->paginate($this->paginateCount);
        return view($this->routeName.'.index')->with('records', $records);
    }

    public function show($id)
    {
        if ($record = $this->service->get($id)) {
            return view($this->routeName.'.show')->with('record', $record);
        }

        return abort(404);
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $this->service->create($data);
        return redirect(route($this->routeName.'.index'))->with('message', 'created');
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($this->service->update($id, $data)) {
            return redirect(route($this->routeName.'.index'))->with('message', 'updated');
        }

        return abort(500);
    }
}
