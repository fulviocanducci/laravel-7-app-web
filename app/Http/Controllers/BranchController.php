<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchFormRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends BaseController
{
    public function __construct(Branch $branch)
    {
        parent::__construct('branch', $branch);
    }

    public function index(Request $request)
    {
        $model = $this->model->orderBy('name');
        if ($filter = $request->get('filter', null)) {
            $model = $model->where('name', 'LIKE', "%{$filter}%");
        }
        $model = $model->paginate()->withQueryString();
        return view($this->getViewIndex(), compact('model', 'filter'));
    }

    public function create()
    {
        return view($this->getViewCreateOrEdit());
    }

    public function edit(Request $request, $id)
    {
        $model = $this->model->where('id', $id)->first();
        return view($this->getViewCreateOrEdit(), compact('model'));
    }

    public function store(BranchFormRequest $request)
    {
        $id = $request->get('id');
        $data['name'] = $request->get('name');
        $data['active'] = (int)$request->get('active', 0);
        if ($id) {
            $result = $this->model->find($id);
            if ($result) {
                $result->fill($data);
                $result->save();
                alert()->success('Informação', 'Alterado com êxito.');
            }
        } else {
            $result = $this->model->create($data);
            alert()->success('Informação', 'Gravado com êxito.');
        }
        return redirect()->route('branch.edit', ['id' => $result->id]);
    }

    public function delete(Request $request, $id)
    {
    }
}
