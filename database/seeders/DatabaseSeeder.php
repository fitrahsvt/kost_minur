<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Role;
use App\Models\Facility;
use App\Models\Slider;
use App\Models\User;
use App\Models\Transaction;
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
            'image' => 'slider1.jpg',
            'title' => 'Parkiran Motor',
            'caption' => 'Aman dan Nyaman, Area Parkir Motor Luas untuk Setiap Penghuni.',
            'status' => 'accepted'
        ]);

        Slider::create([
            'image' => 'slider2.jpg',
            'title' => 'Kamar Lantai 1',
            'caption' => 'Nyaman dan Terjangkau, Kamar Bersih dan Rapi di Lantai 1 untuk Anda.',
            'status' => 'accepted'
        ]);

        Slider::create([
            'image' => 'slider3.jpg',
            'title' => 'Kamar Lantai 2',
            'caption' => 'Privasi Lebih, Nikmati Ketenangan di Kamar Lantai 2 yang Terawat.',
            'status' => 'accepted'
        ]);

        //Role
        Role::create([
                'name' => 'admin'
        ]);

        Role::create([
                'name' => 'pengelola'
        ]);

        Role::create([
                'name' => 'penyewa'
        ]);

        Role::create([
            'name' => 'pemilik'
        ]);

        //User
        User::create([
            'role_id' => 1,
            'nama' => 'Fitrah Amaliah Muis',
            'ktp' => 'admin.png',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'no_hp' => '089627543832',
            'alamat' => 'Komplek Cimpago Permai Blok M/8 RT 003 RW 004 Kel. Koto Luar Kec. Pauh Kota Padang'
        ]);

        User::create([
            'role_id' => 2,
            'nama' => 'Abdul Muis',
            'ktp' => 'pengelola.png',
            'email' => 'pengelola@gmail.com',
            'password' => bcrypt('pengelola'),
            'no_hp' => '085263123023',
            'alamat' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Dummy User',
            'ktp' => 'penyewa.png',
            'email' => 'penyewa@gmail.com',
            'password' => bcrypt('penyewa'),
            'no_hp' => '083333333333',
            'alamat' => 'jl dummy open imsum'
        ]);

        User::create([
            'role_id' => 4,
            'nama' => 'Minur',
            'ktp' => 'pemilik.png',
            'email' => 'pemilik@gmail.com',
            'password' => bcrypt('pemilik'),
            'no_hp' => '+6289673531032',
            'alamat' => 'Komplek Cimpago Permai Blok M/8 RT 003 RW 004 Kel. Koto Luar Kec. Pauh Kota Padang'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Betri',
            'ktp' => 'betri.png',
            'email' => 'betri@gmail.com',
            'password' => bcrypt('betri'),
            'no_hp' => '082283242503',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Ari Julian Putra',
            'ktp' => 'ari-julian-putra.png',
            'email' => 'arijulianputra@gmail.com',
            'password' => bcrypt('arijulianputra'),
            'no_hp' => '082286281229',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Muhammad Rusydi',
            'ktp' => 'muhammad-rusydi.png',
            'email' => 'muhammadrusydi@gmail.com',
            'password' => bcrypt('muhammadrusydi'),
            'no_hp' => '081276064630',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Hafizul Ihsan',
            'ktp' => 'hafizul-ihsan.png',
            'email' => 'hafizulihsan@gmail.com',
            'password' => bcrypt('hafizulihsan'),
            'no_hp' => '+6282387816083',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Fajar Fikri',
            'ktp' => 'fajar-fikri.png',
            'email' => 'fajarfikri@gmail.com',
            'password' => bcrypt('fajarfikri'),
            'no_hp' => '+6282288746388',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Wendi',
            'ktp' => 'wendi.png',
            'email' => 'wendi@gmail.com',
            'password' => bcrypt('wendi'),
            'no_hp' => '082284532989',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Budi Kurniawan',
            'ktp' => 'budi-kurniawan.png',
            'email' => 'budikurniawan@gmail.com',
            'password' => bcrypt('budikurniawan'),
            'no_hp' => '+6285321780946',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Anbi Adiyatma',
            'ktp' => 'anbi-adiyatma.png',
            'email' => 'anbiadiyatma@gmail.com',
            'password' => bcrypt('anbiadiyatma'),
            'no_hp' => '+6282172481065',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Dicky',
            'ktp' => 'dicky.png',
            'email' => 'dicky@gmail.com',
            'password' => bcrypt('dicky'),
            'no_hp' => '082284532989',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'M Faraz Zhafran',
            'ktp' => 'm-faraz-zhafran.png',
            'email' => 'mfarazzhafran@gmail.com',
            'password' => bcrypt('mfarazzhafran'),
            'no_hp' => '+6288279629472',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Muhammad Fauzan',
            'ktp' => 'muhammad-fauzan.png',
            'email' => 'muhammadfauzan@gmail.com',
            'password' => bcrypt('muhammadfauzan'),
            'no_hp' => '+6281275142664',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Irfan Maulana',
            'ktp' => 'irfan-maulana.png',
            'email' => 'irfanmaulana@gmail.com',
            'password' => bcrypt('irfanmaulana'),
            'no_hp' => '+6288279072035',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Cecep',
            'ktp' => 'cecep.png',
            'email' => 'cecep@gmail.com',
            'password' => bcrypt('cecep'),
            'no_hp' => '+6282274492474',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Ahmad Alfaishal',
            'ktp' => 'ahmad-alfaishal.png',
            'email' => 'ahmadalfaishal@gmail.com',
            'password' => bcrypt('ahmadalfaishal'),
            'no_hp' => '+6282288445948',
            'birth' => '1999-04-09',
            'alamat' => 'Koto Harau Kel. Batu Balang Kec. Harau'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Farhan Putra Fajar',
            'ktp' => 'farhan-putra-fajar.png',
            'email' => 'farhanputrafajar@gmail.com',
            'password' => bcrypt('farhanputrafajar'),
            'no_hp' => '+628995721808',
            'birth' => '2004-03-01',
            'alamat' => 'Ikur Koto RT 003 RW 008 Kel. Koto Panjang Ikua Koto Kec. Koto Tangah'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Ahmad Fikriansyah',
            'ktp' => 'ahmad-fikriansyah.png',
            'email' => 'ahmadfikriansyah@gmail.com',
            'password' => bcrypt('ahmadfikriansyah'),
            'no_hp' => '+6282189288044',
            'birth' => '2002-03-05',
            'alamat' => 'Jl. Jend A. Yani RT 002 RW 008 Kel. Lapadde Kec. Ujung'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Nefri Yaldi',
            'ktp' => 'nefri-yaldi.png',
            'email' => 'nefriyaldi@gmail.com',
            'password' => bcrypt('nefriyaldi'),
            'no_hp' => '+6282386622084',
            'birth' => '2004-05-13',
            'alamat' => 'Jorong Aur Duri Kel. Abai Kec. Sangir Batang Hari'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Rahmadi Akbar',
            'ktp' => 'rahmadi-akbar.png',
            'email' => 'rahmadiakbar@gmail.com',
            'password' => bcrypt('rahmadiakbar'),
            'no_hp' => '+6289529913579',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Tubagus Achmat Rizki',
            'ktp' => 'tubagus-achmat-rizki.png',
            'email' => 'tubagusachmatrizki@gmail.com',
            'password' => bcrypt('tubagusachmatrizki'),
            'no_hp' => '+6282217975903',
            'birth' => '2005-12-03',
            'alamat' => 'Suka Sari RT 003 Kel. Sukasari Kec. Sarolangun'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Irfan Maulana',
            'ktp' => 'irfan-maulana-2.png',
            'email' => 'irfanmaulana2@gmail.com',
            'password' => bcrypt('irfanmaulana2'),
            'no_hp' => '+6287863747677',
            'birth' => '2004-05-16',
            'alamat' => 'Jl. Perawang KM. 7 RT 002 RW 001 Kel. Minas Timur Kec. Minas'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Alif Salman Buckharafi',
            'ktp' => 'alif-salman-buckharafi.png',
            'email' => 'alifsalmanbuckharafi@gmail.com',
            'password' => bcrypt('alifsalmanbuckharafi'),
            'no_hp' => '+6281268342339',
            'birth' => '2006-06-02',
            'alamat' => 'Komplek Perumahan Jala Laing Jl. Simpang Damar Blok J No. 8 RT 003 RW 002 Kel. Laing Kec. Tanjung Harapan'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Muhammad Habibullah',
            'ktp' => 'muhammad-habibullah.png',
            'email' => 'muhammadhabibullah@gmail.com',
            'password' => bcrypt('muhammadhabibullah'),
            'no_hp' => '+6282288171117',
            'birth' => '2005-04-28',
            'alamat' => 'Jl. Suka Karya Permindah Perdana Lestari Blok C2-11 RT 002 RW 014 Kel. Sialangmunggu Kec. Tuahmadani'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Lauhul Mahfuzh Afipa',
            'ktp' => 'lauhul-mahfuzh-afipa.png',
            'email' => 'lauhulmahfuzhafipa@gmail.com',
            'password' => bcrypt('lauhulmahfuzhafipa'),
            'no_hp' => '+6285274913075',
            'birth' => '2003-12-08',
            'alamat' => 'Sikadu Kel. Lakitan Timur Kec. Lengayang'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Dean',
            'ktp' => 'dean.png',
            'email' => 'dean@gmail.com',
            'password' => bcrypt('dean'),
            'no_hp' => '081275875595',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Hafis',
            'ktp' => 'hafis.png',
            'email' => 'hafis@gmail.com',
            'password' => bcrypt('hafis'),
            'no_hp' => '+6282283099152',
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Gilang Perdana Putra H',
            'ktp' => 'gilang-perdana-putra-h.png',
            'email' => 'gilangperdanaputrah@gmail.com',
            'password' => bcrypt('gilangperdanaputrah'),
            'no_hp' => '+62895602446847',
            'birth' => '2004-05-01',
            'alamat' => 'Komp. Avia Jaya Jln Angkasa Pura No. 15 Kel. Kasang Kec. Batang Anai'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Alfizen',
            'ktp' => 'alfizen.png',
            'email' => 'alfizen@gmail.com',
            'password' => bcrypt('alfizen'),
            'no_hp' => '+6282285054084',
            'birth' => '2004-02-08',
            'alamat' => 'Dusun III KP Bayas RT 001 RW 013 Kel. Cipang Kanan Kec. Rokan IV Koto'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Muhamad Rafli',
            'ktp' => 'muhamad-rafli.png',
            'email' => 'muhamadrafli@gmail.com',
            'password' => bcrypt('muhamadrafli'),
            'no_hp' => '+6283134240921',
            'birth' => '2006-12-09',
            'alamat' => 'Kajai Barat Kel. Kajai Kec. Pariaman Timur'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Rival Oktian Putra',
            'ktp' => 'rival-oktian-putra.png',
            'email' => 'rivaloktianputra@gmail.com',
            'password' => bcrypt('rivaloktianputra'),
            'no_hp' => '+6282287659267',
            'birth' => '2005-10-13',
            'alamat' => 'Jl. Panglima Sudirman RT 002 RW 019 Kel. Turen Kec. Turen'
        ]);

        User::create([
            'role_id' => 3,
            'nama' => 'Aldino Saputra',
            'ktp' => 'aldino-saputra.png',
            'email' => 'aldinosaputra@gmail.com',
            'password' => bcrypt('aldinosaputra'),
            'no_hp' => '+6282171825219',
            'birth' => '1996-06-08',
            'alamat' => 'Jl. Indarung 17 RT 002 RW 001 Kel. Indarung Kec. Lubuk Kilangan'
        ]);

        // Membuat fasilitas
        $facility1 = Facility::create([
            'nama' => 'WC Dalam (Toilet Jongkok)'
        ]);

        $facility2 = Facility::create([
            'nama' => 'Kamar mandi dalam (Toilet luar)'
        ]);

        $facility3 = Facility::create([
            'nama' => 'Cahaya Masuk Banyak'
        ]);

        $facility4 = Facility::create([
            'nama' => 'Cahaya Masuk Sedang'
        ]);

        $facility5 = Facility::create([
            'nama' => 'Cahaya Masuk Sedikit'
        ]);

        $facility6 = Facility::create([
            'nama' => 'Angin Masuk Kencang'
        ]);

        $facility7 = Facility::create([
            'nama' => 'Angin Masuk sedang'
        ]);

        $facility8 = Facility::create([
            'nama' => 'Angin Tidak Masuk'
        ]);

        $facility9 = Facility::create([
            'nama' => 'Lantai 1'
        ]);

        $facility10 = Facility::create([
            'nama' => 'Lantai 2'
        ]);

        $facility11 = Facility::create([
            'nama' => 'Dekat Pintu Masuk'
        ]);

        $facility12 = Facility::create([
            'nama' => 'Dekat Tangga'
        ]);

        // Membuat kamar
        $room1 = Room::create([
            'nomor' => 1,
            'foto' => '1.JPG',
            'harga' => 550000,
            'status_ketersediaan' => 'ada',
            'ukuran' => '4x4 meter'
        ]);

        $room2 = Room::create([
            'nomor' => 2,
            'foto' => '2.JPG',
            'harga' => 550000,
            'status_ketersediaan' => 'ada',
            'ukuran' => '4x4 meter'
        ]);

        $room3 = Room::create([
            'nomor' => 3,
            'foto' => '3.JPG',
            'harga' => 650000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '4x4 meter'
        ]);

        $room4 = Room::create([
            'nomor' => 4,
            'foto' => '4.JPG',
            'harga' => 700000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3x4 meter'
        ]);

        $room5 = Room::create([
            'nomor' => 5,
            'foto' => '5.JPG',
            'harga' => 700000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3x4 meter'
        ]);

        $room6 = Room::create([
            'nomor' => 6,
            'foto' => '6.JPG',
            'harga' => 700000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3x4 meter'
        ]);

        $room7 = Room::create([
            'nomor' => 7,
            'foto' => '7.JPG',
            'harga' => 700000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3x4 meter'
        ]);

        $room8 = Room::create([
            'nomor' => 8,
            'foto' => '8.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3.5x4 meter'
        ]);

        $room9 = Room::create([
            'nomor' => 9,
            'foto' => '9.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3.5x4 meter'
        ]);

        $room10 = Room::create([
            'nomor' => 10,
            'foto' => '10.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3.5x4 meter'
        ]);

        $room11 = Room::create([
            'nomor' => 11,
            'foto' => '11.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'tidak ada',
            'ukuran' => '3.5x4 meter'
        ]);

        $room12 = Room::create([
            'nomor' => 12,
            'foto' => '12.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'ada',
            'ukuran' => '3x4 meter'
        ]);

        $room13 = Room::create([
            'nomor' => 13,
            'foto' => '13.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'ada',
            'ukuran' => '3x4 meter'
        ]);

        $room14 = Room::create([
            'nomor' => 14,
            'foto' => '14.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'ada',
            'ukuran' => '3x4 meter'
        ]);

        $room15 = Room::create([
            'nomor' => 15,
            'foto' => '15.JPG',
            'harga' => 600000,
            'status_ketersediaan' => 'ada',
            'ukuran' => '3x4 meter'
        ]);

        // Menghubungkan kamar dengan fasilitasnya
        // Kamar 1
        $room1->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility5->id,  // Cahaya Masuk Sedikit
            $facility8->id,  // Angin Tidak Masuk
            $facility9->id,  // Lantai 1
            $facility11->id  // Dekat Pintu Masuk
        ]);

        // Kamar 2
        $room2->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility5->id,  // Cahaya Masuk Sedikit
            $facility8->id,  // Angin Tidak Masuk
            $facility9->id   // Lantai 1
        ]);

        // Kamar 3
        $room3->facilities()->attach([
            $facility1->id,  // WC Dalam (Toilet Jongkok)
            $facility5->id,  // Cahaya Masuk Sedikit
            $facility8->id,  // Angin Tidak Masuk
            $facility9->id   // Lantai 1
        ]);

        // Kamar 4
        $room4->facilities()->attach([
            $facility1->id,  // WC Dalam (Toilet Jongkok)
            $facility4->id,  // Cahaya Masuk Sedang
            $facility6->id,  // Angin Masuk Kencang
            $facility9->id   // Lantai 1
        ]);

        // Kamar 5
        $room5->facilities()->attach([
            $facility1->id,  // WC Dalam (Toilet Jongkok)
            $facility4->id,  // Cahaya Masuk Sedang
            $facility6->id,  // Angin Masuk Kencang
            $facility9->id   // Lantai 1
        ]);

        // Kamar 6
        $room6->facilities()->attach([
            $facility1->id,  // WC Dalam (Toilet Jongkok)
            $facility4->id,  // Cahaya Masuk Sedang
            $facility6->id,  // Angin Masuk Kencang
            $facility9->id   // Lantai 1
        ]);

        // Kamar 7
        $room7->facilities()->attach([
            $facility1->id,  // WC Dalam (Toilet Jongkok)
            $facility4->id,  // Cahaya Masuk Sedang
            $facility6->id,  // Angin Masuk Kencang
            $facility9->id,  // Lantai 1
            $facility11->id  // Dekat Pintu Masuk
        ]);

        // Kamar 8
        $room8->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility6->id,  // Angin Masuk Kencang
            $facility10->id, // Lantai 2
            $facility12->id  // Dekat Tangga
        ]);

        // Kamar 9
        $room9->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility6->id,  // Angin Masuk Kencang
            $facility10->id  // Lantai 2
        ]);

        // Kamar 10
        $room10->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility6->id,  // Angin Masuk Kencang
            $facility10->id  // Lantai 2
        ]);

        // Kamar 11
        $room11->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility6->id,  // Angin Masuk Kencang
            $facility10->id  // Lantai 2
        ]);

        // Kamar 12
        $room12->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility7->id,  // Angin Masuk sedang
            $facility10->id  // Lantai 2
        ]);

        // Kamar 13
        $room13->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility7->id,  // Angin Masuk sedang
            $facility10->id  // Lantai 2
        ]);

        // Kamar 14
        $room14->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility7->id,  // Angin Masuk sedang
            $facility10->id  // Lantai 2
        ]);

        // Kamar 15
        $room15->facilities()->attach([
            $facility2->id,  // Kamar mandi dalam (Toilet luar)
            $facility3->id,  // Cahaya Masuk Banyak
            $facility7->id,  // Angin Masuk sedang
            $facility10->id, // Lantai 2
            $facility12->id  // Dekat Tangga
        ]);


        // // real transaksi
        // // Transaksi untuk Betri (2 bulan)
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 500000,
        //     'penyewa_id' => 5,
        //     'tanggal'=> '2019-03-07',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 500000,
        //     'penyewa_id' => 5,
        //     'tanggal'=> '2019-04-07',
        // ]);

        // // Transaksi untuk Ari Julian Putra (1 bulan)
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 5,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 250000,
        //     'penyewa_id' => 6,
        //     'tanggal'=> '2019-04-01',
        // ]);

        // // Transaksi untuk Muhammad Rusydi (1 bulan)
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 4,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 250000,
        //     'penyewa_id' => 7,
        //     'tanggal'=> '2019-04-01',
        // ]);

        // // Transaksi untuk Budi Kurniawan (6 bulan)
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 300000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2021-09-05',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 300000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2021-10-05',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 300000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2021-11-05',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 300000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2021-12-05',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 300000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2022-01-05',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 6,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'Tunai',
        //     'total_bayar' => 300000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2022-02-05',
        // ]);


        //Transaksi Dummy Data
        // //pending
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 15,
        //     'status_order' => 'pending',
        //     'total_bayar' => 750000,
        //     'penyewa_id' => 5,
        //     'tanggal'=> '2024-08-21',
        // ]);

        // //tolak
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 8,
        //     'status_order' => 'tolak',
        //     'total_bayar' => 600000,
        //     'penyewa_id' => 6,
        //     'tanggal'=> '2024-08-19',
        // ]);

        // //terima
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 12,
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'status_order' => 'terima',
        //     'total_bayar' => 750000,
        //     'penyewa_id' => 7,
        //     'tanggal'=> '2024-08-20',
        // ]);

        // //pending
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 9,
        //     'status_order' => 'pending',
        //     'total_bayar' => 750000,
        //     'penyewa_id' => 8,
        //     'tanggal'=> '2024-08-19',
        // ]);

        // //tolak
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 13,
        //     'status_order' => 'tolak',
        //     'total_bayar' => 600000,
        //     'penyewa_id' => 9,
        //     'tanggal'=> '2024-08-19',
        // ]);

        // //terima
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 7,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'total_bayar' => 750000,
        //     'penyewa_id' => 10,
        //     'tanggal'=> '2024-08-18',
        // ]);

        // //pengeluaran
        // Transaction::create([
        //     'nama' => 'Listrik',
        //     'jenis' => 'pengeluaran',
        //     'status_bayar' => 'bayar',
        //     'status_order' => 'terima',
        //     'bukti' => 'bukti.jpg',
        //     'total_bayar' => 200000,
        //     'tanggal'=> '2024-08-18',
        // ]);

        // Transaction::create([
        //     'nama' => 'Wifi',
        //     'jenis' => 'pengeluaran',
        //     'status_bayar' => 'bayar',
        //     'status_order' => 'terima',
        //     'bukti' => 'bukti.jpg',
        //     'total_bayar' => 220000,
        //     'tanggal'=> '2024-08-18',
        // ]);

        // Transaction::create([
        //     'nama' => 'Air',
        //     'jenis' => 'pengeluaran',
        //     'status_bayar' => 'bayar',
        //     'status_order' => 'terima',
        //     'bukti' => 'bukti.jpg',
        //     'total_bayar' => 50000,
        //     'tanggal'=> '2024-08-18',
        // ]);

        // //sudah ada bukti menunggu pengelola
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 2,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'total_bayar' => 750000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2024-08-17',
        //     'bukti' => 'bukti.jpg',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'belum bayar',
        //     'kamar_id' => 4,
        //     'status_order' => 'terima',
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'total_bayar' => 600000,
        //     'penyewa_id' => 12,
        //     'tanggal'=> '2024-08-16',
        //     'bukti' => 'bukti.jpg',
        // ]);

        // //Riwayat Transaksi
        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 2,
        //     'status_order' => 'terima',
        //     'bukti' => 'bukti.jpg',
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'total_bayar' => 600000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2024-08-12',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 4,
        //     'status_order' => 'terima',
        //     'bukti' => 'bukti.jpg',
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'total_bayar' => 600000,
        //     'penyewa_id' => 12,
        //     'tanggal'=> '2024-08-10',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 2,
        //     'status_order' => 'terima',
        //     'bukti' => 'bukti.jpg',
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'total_bayar' => 600000,
        //     'penyewa_id' => 11,
        //     'tanggal'=> '2024-07-12',
        // ]);

        // Transaction::create([
        //     'jenis' => 'pemasukan',
        //     'status_bayar' => 'bayar',
        //     'kamar_id' => 4,
        //     'status_order' => 'terima',
        //     'bukti' => 'bukti.jpg',
        //     'metode_pembayaran' => 'BRI 085263123023 A.N Fitrah Amalaiah Muis',
        //     'total_bayar' => 600000,
        //     'penyewa_id' => 12,
        //     'tanggal'=> '2024-07-10',
        // ]);


        // User::factory(20)->create();

        // Transaction::factory(20)->create();
    }
}
