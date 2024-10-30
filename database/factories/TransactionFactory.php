<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jenis = $this->faker->numberBetween(1, 2);
        if ($jenis == 1) {
            $jenis == 'pengeluaran';
        }else{
            $jenis == 'pemasukan';
        }

        $status_bayar = $this->faker->numberBetween(1, 2);
        if ($status_bayar == 1) {
            $status_bayar == 'bayar';
        }else{
            $status_bayar == 'belum bayar';
        }

        $status_order = $this->faker->numberBetween(1, 3);
        if ($status_order == 1) {
            $status_order == 'pending';
        }elseif($status_order == 2){
            $status_order == 'tolak';
        }else{
            $status_order == 'terima';
        }

        return [
            'nama' => $this->faker->name(),
            'jenis' => $jenis,
            'status_bayar' => $status_bayar,
            'kamar_id' => $this->faker->numberBetween(1, 20),
            'status_order' => $status_order,
            'bukti' => '1519821482876.jpg',
            'total_bayar' => $this->faker->numberBetween(20000, 10000000),
            'penyewa_id' => $this->faker->numberBetween(1, 20),
            'tanggal'=> $this->faker->date(),
        ];
    }
}
