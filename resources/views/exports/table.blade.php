<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori Produk</th>
            <th>Harga Beli (Rp)</th>
            <th>Harga Jual (Rp)</th>
            <th>Stok Produk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="align-text-center">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ $product->kategori }}</td>
                <td>{{ $product->harga_beli }}</td>
                <td>{{ $product->harga_jual }}</td>
                <td>{{ $product->stok_barang }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
