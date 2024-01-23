<?php

use App\Models\Category;
use Carbon\Carbon;


//Create
it('create a category', function(){
    //unique name
    $fakeNameCategory = "testCategory ". Carbon::now()->timestamp;
    $response = test()->post(route('categories.store',["name" => $fakeNameCategory]));

    expect($response->getStatusCode())->toBe(200);
});

//Read
it("Read a category", function(){
    $response = test()->get(route('categories.index'));
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

//Delete
it('delete a category', function(){
    $categoryFound = Category::latest()->first();
    echo $categoryFound->id;
    $response = test()->delete(route('categories.destroy',[
        "category" => $categoryFound->id
    ]));
    expect($response->getStatusCode())->toBe(200);
});


//Show

it("show a category", function(){
    $response = test()->get(route('categories.show',[
        "category" => "1"
    ]));
    expect($response->getStatusCode())->toBe(200);
});
