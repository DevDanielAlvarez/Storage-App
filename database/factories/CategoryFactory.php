<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //get latest id insert in categories table because the column name is unique
        $lastIdInsertIntTable = Category::latest()->first();
        $lastIdInsertIntTable = $lastIdInsertIntTable->id;

        return [
            //this +1 serves to avoid the unique key exception
            "name" => $this->faker->unique()->word . $lastIdInsertIntTable +1
        ];
    }
}