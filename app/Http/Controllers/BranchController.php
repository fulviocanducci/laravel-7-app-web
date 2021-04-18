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

    public function index()
    {
        $model = $this->model->paginate();
        return view($this->getViewIndex(), compact('model'));
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
            }
        } else {
            $this->model->create($data);
        }
        return redirect()->route('branch.index');
    }

    public function delete(Request $request, $id)
    {
    }
}
