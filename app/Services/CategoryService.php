<?php

namespace App\Services;

use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryService {
    public function __construct(protected Category $model)
    {

    }

    public function index(){
        return $allCategories = $this->model->take(10)->get();

    }

    public function store($data){
         $categoryStored = $this->model->create($data);
         return new CategoryService($categoryStored);
    }

    public function update(array $request): CategoryResource{

        $categoryFound = $this->model->findOrFail($request['id']);
        $categoryFound->name = $request['name'];
        $categoryFound->save();

        $categoryUpdated = $categoryFound;

        return new CategoryResource($categoryUpdated);

    }
    public function destroy($id):bool{
        return $this->model->destroy($id);
    }
}
