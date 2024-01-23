<?php

namespace App\Services;

use App\Models\Product;

class ProductService implements ServiceInterface{

    public function __construct(protected Product $model){}

    public function index(){
       return $products = $this->model->paginate(10);

    }

    public function store(array $data)
    {
        $productCreated = $this->model->create($data);
        return $productCreated;

    }

    public function show($productId){
        return $this->model->findOrFail($productId);
    }
    public function update($data,$productId){
        $productFound = $this->model->findOrFail($productId);
        $productFound->update($data);

        return $productFound;
    }

    public function destroy(string $productId):bool{
        return $this->model->destroy($productId);
    }


}
