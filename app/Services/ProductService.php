<?php

namespace App\Services;

use App\Models\Product;

class ProductService implements ServiceInterface{

    public function __construct(protected Product $model)
    {

    }

    public function index(){
        return $this->model->all();
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
        $productUpdated = $this->model->update($data);
        return $productUpdated;
    }

    public function delete($productId):bool{
        return $this->model->delete($productId);

    }


}
