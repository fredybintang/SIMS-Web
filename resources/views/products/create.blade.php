@extends('main')
@section('title')
    Create - SIMS Web App
@endsection
@section('content')
    <section class="create mt-4 px-4">
        <div class="row">
            <div class="title fs-4">
                <div class="breadcrumb">
                    <span class="mx-1 text-secondary" style="opacity: .5;">Daftar Produk</span>
                    <span class="mx-1"><i class="fa-solid fa-chevron-right fs-5"></i></span>
                    <span class="mx-1 fw-bold">Tambah Produk</span>
                </div>
            </div>
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="kategori" class="form-label fw-bold">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori">
                                <option disabled selected>Pilih Kategori</option>
                                <option>Alat Olahraga</option>
                                <option>Alat Musik</option>
                            </select>
                            @error('kategori')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="nama_produk" class="form-label fw-bold">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                placeholder="Masukan nama Barang">
                            @error('nama_produk')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="harga_beli" class="form-label fw-bold">Harga Beli</label>
                            <input type="number" min="0" class="form-control" id="harga_beli" name="harga_beli"
                                placeholder="Masukan harga beli">
                            @error('harga_beli')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="harga_jual" class="form-label fw-bold">Harga Jual</label>
                            <input type="number" min="0" class="form-control" id="harga_jual" name="harga_jual"
                                placeholder="Masukan harga jual">
                            @error('harga_jual')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="stok_barang" class="form-label fw-bold">Stok Barang</label>
                            <input type="number" min="0" class="form-control" id="stok_barang" name="stok_barang"
                                placeholder="Masukan jumlah stok barang">
                            @error('stok_barang')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="image" class="form-label fw-bold">Upload Image</label>
                            <div class="upload-image">
                                <input type="file" accept="image/png, image/jpeg" class="form-control form-image"
                                    id="image" name="image" onchange="previewImage()">
                                <label for="image" class="form-label image-label w-100 text-primary border-primary">
                                    <img id="preview" src="{{ asset('assets/Image.png') }}" alt="Image" width="100">
                                    <p>Upload gambar disini</p>
                                </label>
                            </div>
                            @error('image')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('product.index') }}" class="btn btn-outline-primary">Batalkan</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
