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

it('create a category', function(){
    //unique name
    $fakeNameCategory = "testCategory ". Carbon::now()->timestamp;
    $response = test()->post(route('categories.store',["name" => $fakeNameCategory]));

    expect($response->getStatusCode())->toBe(200);
});
