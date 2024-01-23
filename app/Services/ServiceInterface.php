<?php

namespace App\Services;

interface ServiceInterface{
    public function index();
    public function store(array $data);
    public function show($id);
    public function update($data,$id);
    public function destroy(string $id):bool;
}
