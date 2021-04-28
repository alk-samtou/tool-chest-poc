<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest as CreateRequest;
use App\Http\Requests\UserDeleteRequest as DeleteRequest;
use App\Http\Requests\UserUpdateRequest as UpdateRequest;
use App\Models\User;
use App\Models\User as Model;
use App\Services\UserService as Service;
use Illuminate\Http\Request;
use MetasisMedia\LaravelGenerator\Interfaces\Crud;

class UserController extends Controller
{
    protected Crud $service;
    protected string $routeName = 'user-directory';
    protected int $paginateCount = 12;

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

    public function index(Request $request)
    {
        $orderBy = $request->input('orderBy', 'last_name');
        $sort = $request->input('sort', 'asc');
        $records = User::orderBy($orderBy, $sort)->paginate(12);
        return view('user-directory.index',compact('orderBy','sort','records'));
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
