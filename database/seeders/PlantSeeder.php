<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Monstera Deliciosa',
                'species' => 'Monstera deliciosa',
                'price' => 150000,
                'description' => 'Daun besar berlubang, populer untuk dekorasi indoor.',
                'image' => 'monstera.jpg',
                'sunlight_requirements' => 'Cahaya terang tidak langsung',
            ],
            [
                'name' => 'Lidah Mertua',
                'species' => 'Sansevieria trifasciata',
                'price' => 50000,
                'description' => 'Tahan banting dan menyaring udara.',
                'image' => 'sansevieria.jpg',
                'sunlight_requirements' => 'Cahaya rendah hingga sedang',
            ],
            [
                'name' => 'Aglonema',
                'species' => 'Aglaonema commutatum',
                'price' => 120000,
                'description' => 'Daun bercorak merah muda yang cantik.',
                'image' => 'aglonema.jpg',
                'sunlight_requirements' => 'Cahaya redup',
            ],
            [
                'name' => 'Kaktus Mini',
                'species' => 'Mammillaria sp.',
                'price' => 25000,
                'description' => 'Kecil, mudah dirawat, jarang disiram.',
                'image' => 'kaktus.jpg',
                'sunlight_requirements' => 'Sinar matahari penuh',
            ],
            [
                'name' => 'Calathea Orbifolia',
                'species' => 'Goeppertia orbifolia',
                'price' => 95000,
                'description' => 'Daun lebar bergaris perak.',
                'image' => 'calathea.jpg',
                'sunlight_requirements' => 'Cahaya tidak langsung',
            ],
            [
                'name' => 'Sirih Gading',
                'species' => 'Epipremnum aureum',
                'price' => 40000,
                'description' => 'Tanaman merambat untuk gantung.',
                'image' => 'sirih-gading.jpg',
                'sunlight_requirements' => 'Cahaya rendah hingga terang',
            ],

            [
    'name' => 'Garden Hand Tools Set',
    'species' => 'Gardening Tools',
    'price' => 175000,
    'description' => 'Set alat berkebun dengan gagang kayu yang ergonomis, cocok untuk menggali tanah, merapikan tanaman, dan mengolah media tanam.',
    'image' => 'gt.jpg',
    'sunlight_requirements' => 'Tidak berlaku',
],

[
    'name' => 'Forest Green Watering Can',
    'species' => 'Garden Watering Equipment',
    'price' => 125000,
    'description' => 'Penyiram tanaman berbahan logam berwarna hijau tua dengan desain klasik yang elegan, cocok untuk merawat tanaman indoor maupun outdoor.',
    'image' => 'wp.jpg',
    'sunlight_requirements' => 'Tidak berlaku',
],

[
    'name' => 'ZZ Plant',
    'species' => 'Zamioculcas zamiifolia',
    'price' => 135000,
    'description' => 'Tanaman hias dengan daun hijau mengilap dan batang tegak yang elegan. Cocok untuk dekorasi ruangan bergaya minimalis serta mudah dirawat.',
    'image' => 'zz-plant.jpg',
    'sunlight_requirements' => 'Cahaya tidak langsung, toleran terhadap cahaya rendah',
],
        ];

        foreach ($data as $plant) {
            Plant::create($plant);
        }
    }
}
