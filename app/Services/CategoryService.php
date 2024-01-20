<?php

namespace App\Services;

use App\Models\Category;

class CategoryService {
    public function __construct(protected Category $model)
    {

    }

    public function index(){
        return $allCategories = Category::take(10)->get();

    }

    public function store($data){
        return $categoryStored = Category::create($data);
    }
}
