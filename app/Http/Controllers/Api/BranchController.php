<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends BaseApiController
{
    /**
     * @OA\Schema(
     *   schema="branch",
     *   allOf={
     *     @OA\Schema(
     *       @OA\Property(property="id", type="integer"),
     *       @OA\Property(property="name", type="string"),
     *       @OA\Property(property="active", type="string", format="boolean"),
     *     )
     *   }
     * )
     *
     */
    public function __construct(Branch $model)
    {
        parent::__construct($model);
        $this->validations
            ->add('id', 'required|integer')
            ->add('name', 'required|min:3')
            ->add('active', 'required');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/branch",
     *     description="Branch - Get All",
     *     tags={"Branch"},
     *     security={{"bearer_token":{}}},
     *     @OA\Response(
     *      response=200,
     *      description="Ok", 
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *          @OA\Items(ref="#/components/schemas/branch")
     *         )
     *      )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"), 
     * )
     */
    public function getBranchs()
    {
        $result = $this->model->all();
        return $this->ok($result);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/branch/{id}",
     *     description="Branch - Get By Id",
     *     tags={"Branch"},
     *     security={{"bearer_token":{}}}, 
     *     @OA\Parameter(ref="#/components/parameters/id"),
     *     @OA\Response(
     *      response=200,
     *      description="Ok",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(ref="#/components/schemas/branch")
     *      )
     *     ),   
     *     @OA\Response(response=400, description="Bad request"), 
     *     @OA\Response(response=401, description="Unauthorized"), 
     *     @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function getBranch($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            return $this->ok($result);
        }
        return $this->notFound();
    }

    /**
     * @OA\Post(
     *     path="/api/v1/branch",
     *     description="Branch - Created",
     *     tags={"Branch"},
     *     security={{"bearer_token":{}}}, 
     *     @OA\RequestBody(
     *      required=true,
     *      description="Branch",
     *      @OA\JsonContent(
     *          ref="#/components/schemas/branch"   
     *      ),
     *     ),     
     *     @OA\Response(
     *      response=200,
     *      description="Successful",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(ref="#/components/schemas/branch")
     *      )
     *     ),   
     *     @OA\Response(response=400, description="Bad request"), 
     *     @OA\Response(response=401, description="Unauthorized"), 
     * )
     */
    public function postBranch(Request $request)
    {
        $errors = array();
        if ($this->validated($request->all(), $errors, ['id'])) {
            $result = $this->model->create($request->all());
            return $this->created($result);
        }
        return $this->badRequest($errors);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/branch/{id}",
     *     description="Branch - Update",
     *     tags={"Branch"},
     *     security={{"bearer_token":{}}}, 
     *     @OA\Parameter(ref="#/components/parameters/id"),
     *     @OA\RequestBody(
     *      required=true,
     *      description="Branch",
     *      @OA\JsonContent(
     *          ref="#/components/schemas/branch"   
     *      ),
     *     ),     
     *     @OA\Response(
     *      response=200,
     *      description="Successful",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(ref="#/components/schemas/branch")
     *      )
     *     ),   
     *     @OA\Response(response=400, description="Bad request"), 
     *     @OA\Response(response=401, description="Unauthorized"), 
     * )
     */
    public function putBranch(Request $request, $id)
    {
        $errors = array();
        if ($this->validated($request->all(), $errors)) {
            $result = $this->model->find($id);
            $result->fill($request->except('id'));
            $result->save();
            return $this->ok($result);
        }
        return $this->badRequest($errors);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/branch/{id}",
     *     description="Branch - Delete",
     *     tags={"Branch"},
     *     security={{"bearer_token":{}}}, 
     *     @OA\Parameter(ref="#/components/parameters/id"),
     *     @OA\Response(
     *      response=200,
     *      description="Successful"     
     *     ),   
     *     @OA\Response(response=400, description="Bad request"), 
     *     @OA\Response(response=401, description="Unauthorized"), 
     *     @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function delBranch($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();
            return $this->okDeleted();
        }
        return $this->notFound();
    }
}
