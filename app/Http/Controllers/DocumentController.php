<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentCreateRequest as CreateRequest;
use App\Http\Requests\DocumentDeleteRequest as DeleteRequest;
use App\Http\Requests\DocumentUpdateRequest as UpdateRequest;
use App\Models\Document as Model;
use App\Services\DocumentService as Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use MetasisMedia\LaravelGenerator\Interfaces\Crud;

class DocumentController extends Controller
{
    protected Crud $service;
    protected string $routeName = '{{namePluralLowerCaseKebab}}';
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

    public function download(\Illuminate\Http\Request $request, $id){
        if ($record = $this->service->get($id)) {
          if(Auth::check()){
              // user authenticated already, just download it...
              return Storage::download($record->file_path, $record->original_file_name);
          } else {
              // if the password was passed via url, use it if it works
              $password = $request->input('p',false);
              if($password && $password === $record->password){
                  return Storage::download($record->file_path, $record->original_file_name);
              }
              // user is not authenticated, show the form
              return view('documents.public-password-protected')->with('document',$record);
          }
        }

        abort(404);
    }
    public function passwordDownload(\Illuminate\Http\Request $request, $id){
        if ($record = $this->service->get($id)) {

            $validator = Validator::make($request->all(), [
                'password' => [
                    'required',
                    'max:255',
                    function ($attribute, $value, $fail) use($record) {

                        if ($value !== $record->password) {
                            $fail('The document password is invalid.');
                        }
                    },
                ],
            ]);
            $validator->validate();
        }

    }
}
