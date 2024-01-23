<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Exception;

class ProductApiController extends Controller
{
    public function __construct(protected ProductService $service)
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
    public function store(StoreProductRequest $request)
    {

        return new ProductResource(
            $this->service->store($request->validated())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
            try{
                $productFound = $this->service->show($product);
                return new ProductResource($productFound);
            }
            catch(Exception $exception){
                return response()->json([
                    "message" => "Not Found",
                ],404);
            }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        return new ProductResource($this->service->update($request->validated(),$product->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $responseService = $this->service->destroy($product);
        return response()->json($responseService);
    }
}
