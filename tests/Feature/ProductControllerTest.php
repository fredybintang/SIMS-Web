<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Http\UploadedFile;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        // Simulasikan pengunggahan file
    $file = UploadedFile::fake()->image('product_image.jpg');

    $response = $this->post(route('store'), [
        'nama_produk' => 'Produk Baru',
        'kategori' => 'Alat Olahraga',
        'harga_beli' => 100,
        'stok_barang' => 50,
        'image' => $file,
    ]);

    $response->assertStatus(302); // Redirect status
    $this->assertDatabaseHas('products', ['nama_produk' => 'Produk Baru']);
    }

    // Tambahkan metode pengujian untuk read, update, dan delete
}
