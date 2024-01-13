<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

class ExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'Daftar Produk.xlsx');
    }
}
