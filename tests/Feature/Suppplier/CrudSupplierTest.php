<?php

use App\Models\User;

it("read suppliers", function(){

    $response = test()->get(route("suppliers.index"));

    expect($response->getStatusCode())->toBe(200);

});


it("create a supplier",function(){

    $response = test()->post(route('suppliers.store',[
        "user_id" => User::first()->id
    ]));

    expect($response->getStatusCode())->toBe(200);
});