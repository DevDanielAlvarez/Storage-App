<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //foreign keys
            "category_id" => Category::factory(),
            "supplier_id" => Supplier::factory(),

            //normal columns
            "name" => $this->faker->name(),
            "weight" =>$this->faker->randomFloat(2,0,1000),
            "description" => $this->faker->text(),
            "quantity" => $this->faker->randomNumber(),


        ];
    }
}
