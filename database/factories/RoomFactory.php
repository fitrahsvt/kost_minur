<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status_ketersediaan = $this->faker->numberBetween(1, 2);
        if ($status_ketersediaan == 1) {
            $status_ketersediaan == 'ada';
        }else{
            $status_ketersediaan == 'tidak_ada';
        }
        return [
            'nomor' => $this->faker->numberBetween(7, 20),
            'foto' => '1686645643.jpg',
            'harga' => $this->faker->numberBetween(20000, 10000000),
            'status_ketersediaan' => $status_ketersediaan,
            'ukuran' => '3x4 meter'
        ];
    }
}
