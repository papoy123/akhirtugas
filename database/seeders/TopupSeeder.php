<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topup;

class TopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topup::create([
            'gambar' => 'indosat.jpg',
            'nama' => 'Indosat Ooredoa',
            'paket' => 'Paketan Siang Malam Pagi 100GB',
            'harga' => 'Rp.100.000.00 '
        ]);

        Topup::create([
            'gambar' => 'telkomsel.jpg',
            'nama' => 'Telkomsel Lae ',
            'paket' => 'Paketan Siang Malam Pagi 100GB',
            'harga' => 'Rp.100.000.00 '
        ]);

        Topup::create([
            'gambar' => 'xl.jpg',
            'nama' => 'XL Lae',
            'paket' => 'Paketan Siang Malam Pagi 100GB',
            'harga' => 'Rp.100.000.00 '
        ]);
    }
}
