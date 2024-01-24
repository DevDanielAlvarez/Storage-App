<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use App\Services\SupplierService;

class SupplierApiController extends Controller
{
    public function __construct(protected SupplierService $service)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->index();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        return new SupplierResource($this->service->store($request->only(["user_id","status"])));
    }
    public function show(Supplier $supplier)
    {
        return new SupplierResource( $this->service->show($supplier->id));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}