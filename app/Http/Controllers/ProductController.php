<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('nama_produk', 'ILIKE', '%' . $search . '%');
        })
        ->when($kategori, function ($query) use ($kategori) {
            return $query->where('kategori', $kategori);
        })
        ->paginate(10);

        return view('products.product', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|unique:products',
            'kategori' => 'required',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok_barang' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png|max:100',
        ], [
            'nama_produk.required' => 'Nama barang wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'harga_beli.required' => 'Harga beli wajib diisi.',
            'harga_jual.required' => 'Harga Jual wajib diisi.',
            'stok_barang.required' => 'Stok barang wajib diisi.',
            'image.image' => 'Harus berupa gambar JPG, PNG.',
            'image.max' => 'Gambar tidak boleh lebih dari 100KB.',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $product = Product::create([
            'nama_produk' => $request->input('nama_produk'),
            'kategori' => $request->input('kategori'),
            'harga_beli' => $request->input('harga_beli'),
            'harga_jual' => $request->input('harga_jual'),
            'stok_barang' => $request->input('stok_barang'),
            'image' => $imagePath,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');

    }

    public function show(Product $product, $id)
    {
        $product = Product::find($id);

        return view('products.edit')->with([
            'id' => $id,
            'product' => $product->nama_produk,
            'hargabeli' => $product->harga_beli,
            'hargajual' => $product->harga_jual,
            'stok' => $product->stok_barang,
            'image' => $product->image,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => [
                'required',
                Rule::unique('products')->ignore($id, 'id'),
            ],
            'harga_beli' => 'required|numeric|min:0',
            'stok_barang' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png|max:100',
        ], [
            'nama_produk.required' => 'Nama barang wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'harga_beli.required' => 'Harga beli wajib diisi.',
            'harga_jual.required' => 'Harga Jual wajib diisi.',
            'stok_barang.required' => 'Stok barang wajib diisi.',
            'image.image' => 'Harus berupa gambar JPG, PNG.',
            'image.max' => 'Gambar tidak boleh lebih dari 100KB.',
        ]);

        $product = Product::find($id);

        $oldImagePath = $product->image;

        $product->update([
            'nama_produk' => $request->input('nama_produk'),
            'harga_beli' => $request->input('harga_beli'),
            'stok_barang' => $request->input('stok_barang'),
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : $oldImagePath,
        ]);

        if ($request->file('image')) {
            Storage::disk('public')->delete($oldImagePath);
        }

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('storage')->exists($product->image)) {
            Storage::disk('storage')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
