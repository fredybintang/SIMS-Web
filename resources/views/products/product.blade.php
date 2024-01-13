@extends('main')
@section('title')
    Produk -SIMS Web App
@endsection
@section('content')
    <section class="product d-flex mt-4 px-4">
        <div class="row">
            <div class="title fs-4 fw-bold">Daftar Produk</div>
            <div class="col-md-5">
                <form id="filterForm" action="{{ route('product.index') }}" method="GET">
                    <div class="row gap-2">
                        <div class="col-md-6 position-relative">
                            <input type="text" class="form-control search ps-5" id="search" name="search"
                                placeholder="Cari barang" value="{{ request('search') }}">
                            <button type="submit" class="btn position-absolute top-0 left-0"><i
                                    class="fa-solid fa-magnifying-glass text-secondary"></i></button>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" id="kategori" name="kategori">
                                <option value="" @if (!request('kategori')) selected @endif>Semua</option>
                                <option value="Alat Olahraga" @if (request('kategori') == 'Alat Olahraga') selected @endif>Alat
                                    Olahraga</option>
                                <option value="Alat Musik" @if (request('kategori') == 'Alat Musik') selected @endif>Alat Musik
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <div class="d-flex justify-content-end mb-3 gap-3">
                    <a class="btn btn-success d-flex align-items-center" href="{{ route('export-excel', request()->all()) }}">
                        <img src="{{ asset('assets/MicrosoftExcelLogo.png') }}" alt="Export">
                        <span class="ms-1">Export Excel</span>
                    </a>
                    <a href="{{ route('create') }}" class="btn btn-danger d-flex align-items-center">
                        <img src="{{ asset('assets/plus-circle.svg') }}" alt="Tambah Data" width="14"
                            class="text-white">
                        <span class="ms-1">Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Image</th>
                            <th>Nama Produk</th>
                            <th>Kategori Produk</th>
                            <th>Harga Beli (Rp)</th>
                            <th>Harga Jual (Rp)</th>
                            <th>Stok Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = ($products->currentPage() - 1) * $products->perPage();
                        @endphp

                        @foreach ($products as $product)
                            <tr class="align-text-center">
                                <td class="text-center">{{ ++$nomor }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nama_produk }}"
                                        height="30">
                                </td>
                                <td>{{ $product->nama_produk }}</td>
                                <td>{{ $product->kategori }}</td>
                                <td>{{ $product->harga_beli }}</td>
                                <td>{{ $product->harga_jual }}</td>
                                <td>{{ $product->stok_barang }}</td>
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <a href='{{ url('edit/' . $product->id) }}'><img src="{{ asset('assets/edit.png') }}"
                                            alt=""></a>
                                    <form action="{{ route('destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"
                                            onclick="return confirm('Yakin ingin menghapus data?')"><img
                                                src="{{ asset('assets/delete.png') }}" alt=""></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <nav aria-label="Page navigation">
                        <ul class="pagination d-flex justify-content-between">
                            {{ $products->links('components.pagination') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
