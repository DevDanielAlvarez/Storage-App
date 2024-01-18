<?php

use App\Models\Category;

it("name is unique?", function(){

    try{
        for($i=0; $i<2; $i++){

            Category::create([
                "name" => "unique"
            ]);

        }

    }catch(Exception $exception){
        //the code 23000 references unique error in sql
        expect($exception->getCode())->toBe('23000');
        return;
    }

    $this->fail("name is not unique!");

});