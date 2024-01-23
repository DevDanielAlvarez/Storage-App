<?php

//Create

use App\Models\Product;
use App\Models\Supplier;

it("create a product", function(){

    $response = test()->post(route("products.store", [
        "name" => "product1",
        "weight" => 2.9,
        "description" => "lorelorel lorellorelorelorelore lorelorelronm",
        "quantity" => "568",
        "supplier_id" => 1,
        "category_id" => 1
    ]));

    expect($response->getStatusCode())->toBe(201);

});

//Read
it("read products", function(){

    $response = test()->get(route("products.index"));

    expect($response->getStatusCode())->toBe(200);

});

//Update

it("update a product", function(){
    $response = test()->put(route("products.update",[
        "product" => Product::first()->id,
        "name" => "nameUpdated",
        "supplier_id" => Supplier::first()->id,

    ]));

    expect($response->getStatusCode())->toBe(200);
});

//Delete
it("delete a product", function(){

    $productCreated = Product::factory()->create();
    $response = test()->delete(route("products.destroy",[
        "product" => $productCreated->id
    ]));
    expect($response->getStatusCode())->toBe(200);
});
