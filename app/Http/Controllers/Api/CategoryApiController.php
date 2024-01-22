<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function __construct(protected CategoryService $service)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mudar a logic do resource para dentro do service, retornar apenas $this->service->index();

        return CategoryResource::collection($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        if(!$categoryCreatedData = $this->service->store($request->validated())){
            return response()->json("Error",422);
        }

        return response()->json([
            "message" => "Category Register Success!",
            "successQuery" => true,
            "categoryCreatedData" => $categoryCreatedData
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request,$category)
    {
        $categoryUpdatedData = $this->service->update($request->only(['category','name']),$category);
        return response()->json([
            "message" => "category updated success!",
            "successQuery" => true,
            "categoryUpdatedData" => $categoryUpdatedData
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $categoryId)
    {
        if(!$this->service->destroy($categoryId)){
            return response()->json([
                "message" => "Error",
                "successQuery" => false
            ]);
        }

        return response()->json([
            "message" => "category deleted!",
            "successQuery" => true
        ]);
    }
}
