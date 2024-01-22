<?php
/*
É necessário usar o service do recurso e nao usar o model, pois com o model é não testamos a funcionalidade
dentro do contexto esperado.
*/
//read

use App\Models\Category;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Carbon\Carbon;
use App\Http\Requests\StoreCategoryRequest;
use Tests\TestCase;

//Read
it("Read a category", function(){
    $response = test()->get(route('categories.index'));
    expect($response->getStatusCode())->toBe(200);

});

//Create
it('create a category', function(){
    //unique name
    $fakeNameCategory = "testCategory ". Carbon::now()->timestamp;
    $response = test()->post(route('categories.store',["name" => $fakeNameCategory]));

    expect($response->getStatusCode())->toBe(200);
});

//Update
it('updated a category', function(){
    $category = Category::first();
    // dd($category->id);
    $response = test()->put(route('categories.update',[
        "category" => 1,
        "test" => "test",
        "name" => "danidanidani"
    ]));
    expect($response->getStatusCode())->toBe(200);

});
