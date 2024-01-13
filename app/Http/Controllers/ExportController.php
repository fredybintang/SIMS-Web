<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Models\Product;

class ExportController extends Controller
{
    public function exportExcel(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('nama_produk', 'LIKE', '%' . $search . '%');
        })
            ->when($kategori, function ($query) use ($kategori) {
                return $query->where('kategori', $kategori);
            })
            ->get();

        return Excel::download(new ProductExport($products), 'Daftar Produk.xlsx');
    }
}
