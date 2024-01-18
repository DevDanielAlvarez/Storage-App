<?php

//read

use App\Models\Category;

//Read
it("read categories", function(){

    $hasCategory = Category::first();

    if($hasCategory){
        $categories = Category::take(5)->get();
        expect($categories)->not->toBeEmpty();
    }else{
        $this->markTestSkipped('Nenhuma categoria encontrada no banco de dados.');
    }
});

//Create
it("create a category", function(){
    $categoryCreated = Category::factory(1)->create();
    // dd($categoryCreated[0]->name);
    expect($categoryCreated->toArray())->toBeArray();
});