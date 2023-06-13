<?php

namespace Database\Factories;

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
    public function definition()
    {

        $status = $this->faker->numberBetween(1, 3);
        if ($status == 1) {
            $status == 'waiting';
        }elseif ($status == 2){
            $status == 'accepted';
        }else{
            $status == 'rejected';
        }
        return [
            'category_id' => $this->faker->numberBetween(1, 6),
            'name' => $this->faker->sentence(mt_rand(1, 4)),
            'image' => '1686536852.jpg',
            'desc' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(20000, 10000000),
            'brand_id' => $this->faker->numberBetween(1, 8),
            'status' => $status,
            'created_by' => '2'
        ];
    }
}
