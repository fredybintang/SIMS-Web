<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    protected $products;
    protected $index = 0;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function collection()
    {
        $search = request('search');
        $kategori = request('kategori');

        $query = Product::select('id', 'nama_produk', 'kategori', 'harga_beli', 'harga_jual', 'stok_barang');

        if ($search) {
            $query->where('nama_produk', 'like', '%' . $search . '%');
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $products = $query->get();

        return $products;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Produk',
            'Kategori Produk',
            'Harga Beli (Rp)',
            'Harga Jual (Rp)',
            'Stok Produk',
        ];
    }

}
