<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama_produk' => 'Jersey Liverpool',
            'kategori' => 'Alat Olahraga',
            'harga_beli' => 100,
            'harga_jual' => 130,
            'stok_barang' => 50
        ]);
    }
}
