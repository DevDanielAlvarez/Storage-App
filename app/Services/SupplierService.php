<?php

namespace App\Services;

use App\Models\Supplier;

class SupplierService implements ServiceInterface{

public function __construct(protected Supplier $model)
{

}

public function index(){
    return $this->model->paginate(10);
}
public function show($supplierId){
    return $this->model->findOrFail($supplierId);
}
public function store(array $data){
    if(!isset($data['status'])){ $data['status'] = "i";}

    return $this->model->create($data);
}
public function update($data, $id){}
public function destroy(string $id): bool{

}

}