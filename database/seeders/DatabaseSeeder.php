<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Slider
        Slider::create([
            'image' => '1686632311.jpg',
            'title' => 'Real Beauty Real Speed',
            'caption' => 'THE BMW PR S1000 - TRUE POWER AND ELEGANCE',
            'status' => 'accepted'
        ]);

        Slider::create([
            'image' => '1686632739.jpg',
            'title' => 'Enjoy a stable ride',
            'caption' => "CB HORNET'S MONO SUSPENSION",
            'status' => 'accepted'
        ]);

        Slider::create([
            'image' => '1686632889.jpg',
            'title' => 'Geared for every surprice',
            'caption' => 'Presenting the All New FSZ F1 RANGE with REAR DISC BRAKE',
            'status' => 'accepted'
        ]);

        Slider::create([
            'image' => '1686632977.jpg',
            'title' => 'performance Presence Control',
            'caption' => 'Presenting the All New FZ-5 RANGE with REAR DISC BRAKE',
            'status' => 'accepted'
        ]);

        Slider::create([
            'image' => '1686633062.jpg',
            'title' => 'Power to Control',
            'caption' => 'FZ-5 FI',
            'status' => 'accepted'
        ]);

        Slider::create([
            'image' => '1686633142.jpg',
            'title' => 'Slider 4',
            'caption' => 'This is slider 4',
            'status' => 'accepted'
        ]);

        //Role
        Role::create([
                'name' => 'admin'
        ]);

        Role::create([
                'name' => 'staff'
        ]);

        Role::create([
                'name' => 'user'
        ]);

        //User
        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'avatar' => '1686278465.jpg',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '081111111111',
            'address' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',
            'birth' => "2000-06-15",
            'gender' => 'L'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Staff',
            'avatar' => '1686279008.jpg',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('staff'),
            'phone' => '082222222222',
            'address' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',
            'birth' => "2000-06-15",
            'gender' => 'L'
        ]);

        User::create([
            'role_id' => 3,
            'name' => 'User',
            'avatar' => '1686279075.jpg',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '083333333333',
            'address' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',
            'birth' => "2000-06-15",
            'gender' => 'L'
        ]);

        //category
        Category::create([
            'name' => 'Sparepart'
        ]);

        Category::create([
            'name' => 'Aksesoris'
        ]);

        Category::create([
            'name' => 'Helm'
        ]);

        Category::create([
            'name' => 'Perkakas'
        ]);

        Category::create([
            'name' => 'Perlengkapan rider'
        ]);

        Category::create([
            'name' => 'Lainnya'
        ]);

        //brand
        Brand::create([
            'name' => 'Kawasaki'
        ]);

        Brand::create([
            'name' => 'Daytona'
        ]);

        Brand::create([
            'name' => 'Tanax'
        ]);

        Brand::create([
            'name' => 'SP Takegawa'
        ]);

        Brand::create([
            'name' => 'Endurance'
        ]);

        Brand::create([
            'name' => 'Honda'
        ]);

        Brand::create([
            'name' => 'Yamaha'
        ]);

        Brand::create([
            'name' => 'lainnya'
        ]);

        //product
        Product::create([
            'category_id' => 2,
            'name' => 'Lampu sen reteng sign mini',
            'image' => '1686645643.jpg',
            'desc' => 'merupakan sparepart motor yang cocok untuk berbagai varian merk motor.
            dengan bahan yang berkualitas dan terjamin mutunya. dan berguna untuk menambah kenyaman berkendara anda.',
            'price' => 22000,
            'brand_id' => 8,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Karet Foot Step Belakang',
            'image' => '1686645719.jpg',
            'desc' => 'Karet Foot Step Belakang ekstra tebal dengan diameter maksimal 72mm demi tampilan Rebel yang lebih tangguh.
            Mencegah kerusakan pada as shock depan karena terpaan bebatuan kecil dan pada seal shock karena debu/
            Jika dipasang bersamaan dengan cover shock depan, gaya all blackout Rebel yang keren bisa makin sempurna.',
            'price' => 25000,
            'brand_id' => 6,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'stavolt/stabilizer motor DC 12 volt',
            'image' => '1686645789.jpg',
            'desc' => 'sparepart stabilizer DC motor untuk stavolt/stabilizer capacity 3kva-10kva.
            barang sesuai spek kalo ada perbedaan itu pun tidak mempengaruhi daya kerjanya semua fungsi sama.
            sebelum di order cocokin dulu apakah sama persis dengan yang agan miliki.',
            'price' => 395000,
            'brand_id' => 8,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'SPION MOTOR VARIASI DMAX UNIVERSAL',
            'image' => '1686645880.jpg',
            'desc' => 'TYPE DRAT MOTOR
            HONDA - Drat Baut Kunci 14 Arah putaran saat mengencangkan Kanan Kanan ( Khas Drat Spion Honda )
            YAMAHA - Drat Baut Kunci 14 Arah Putaran Saat Mengencangkan Kanan Kiri ( Khas Drat Spion Yamaha )',
            'price' => 29000,
            'brand_id' => 7,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Sparepart Asli Astra Honda Motor (AHM)',
            'image' => '1686645932.jpg',
            'desc' => 'Honda Genuine Parts merupakan suku cadang asli Honda yang direkomendasikan oleh PT. Astra Honda Motor, sehingga menjamin keaslian motor Honda Anda.',
            'price' => 1000000,
            'brand_id' => 1,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Speedometer Roatiga HTM APPKTM Gajah',
            'image' => '1686646008.jpg',
            'desc' => 'Nama Part : Meter Set Black
            Kode Part : 37100-FG000-LG0031
            Untuk Motor : 200 R , 150 R',
            'price' => 373000,
            'brand_id' => 5,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Blitz R original Kawasaki',
            'image' => '1686646047.jpg',
            'desc' => 'Karet boots hitam ekstra tebal dengan diameter maksimal 72mm demi tampilan Rebel yang lebih tangguh.
            Mencegah kerusakan pada as shock depan karena terpaan bebatuan kecil dan pada seal shock karena debu/
            Jika dipasang bersamaan dengan cover shock depan, gaya all blackout Rebel yang keren bisa makin sempurna.',
            'price' => 1400000,
            'brand_id' => 3,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'air heater DAH-XDFT30-RS',
            'image' => '1686646066.jpg',
            'desc' => 'Keunggulan :
            1. Terdaftar dan terverifikasi oleh SNI (Standar Nasional Indonesia)
            2. Terdaftar dan terverifikasi oleh KAN (Komite Akreditasi Nasional - Laboratorium Penguji)
            3. Terdaftar dan terverifikasi oleh Member of AMCA Internasional
            4. Garansi service 1 tahun',
            'price' => 870000,
            'brand_id' => 6,
            'status' => 'accepted',
            'created_by' => 2
        ]);

        Product::factory(25)->create();

        User::factory(20)->create();

    }
}
