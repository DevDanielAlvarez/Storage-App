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
        $categoryIds = Category::pluck('id')->take(10);
        $randomCategoryId = $this->faker->randomElement($categoryIds);

        return [
            //foreign keys
            "category_id" => $randomCategoryId,
            "supplier_id" => Supplier::factory(),

            //normal columns
            "name" => $this->faker->name(),
            "weight" =>$this->faker->randomFloat(2,0,1000),
            "description" => $this->faker->text(),
            "quantity" => $this->faker->randomNumber(),


        ];
    }
}