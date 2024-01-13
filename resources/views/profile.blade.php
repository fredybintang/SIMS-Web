@extends('main')
@section('title')
    Profil - SIMS Web App
@endsection
@section('content')
    <section class="mt-4 px-4">
        <img src="{{ asset('assets/Nuno Pereira Fredy Bintang.jpg') }}" alt="Nuno Pereira Fredy Bintang" width="150" height="150" class="rounded-circle">
        <div class="name fs-3 fw-bold mt-3">Nuno Pereira Fredy Bintang Harlanda</div>
        <div class="row mt-4">
            <div class="col-md-8">
                <span>Nama Kandidat</span>
            </div>
            <div class="col-md-4">
                <span>Posisi Kandidat</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="border rounded p-2">
                    <i class="fa-solid fa-at"></i><span class="ms-2">Nuno Pereira Fredy Bintang Harlanda</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-2">
                    <i class="fa-solid fa-code"></i><span class="ms-2">Web Programmer</span>
                </div>
            </div>
        </div>
    </section>
@endsection
