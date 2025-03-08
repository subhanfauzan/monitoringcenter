@extends('layouts.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 justify-content-center"> <!-- Tambahkan justify-content-center -->
            <div class="col-12 col-lg-16"> <!-- Batas lebar maksimum untuk konten -->
                <div class="card shadow">
                    <img src="{{ asset('images/Banner.png') }}" alt="">
                    <div class="card-body p-4 p-lg-5"> <!-- Padding responsif -->
                        <div class="row text-center g-4"> <!-- Baris dengan text-center -->
                            <!-- Kolom 1 -->
                            <div class="col-12 col-md-4">
                                <div class="p-3 bg-light rounded-3 h-100"> <!-- Card mini -->
                                    <h3 class="text-primary">2000</h3>
                                    <p class="mb-0">Peluncuran Pertama</p>
                                    <small class="text-muted">Power Mac G4 Cube</small>
                                </div>
                            </div>

                            <!-- Kolom 2 -->
                            <div class="col-12 col-md-4">
                                <div class="p-3 bg-light rounded-3 h-100">
                                    <h3 class="text-primary">2019</h3>
                                    <p class="mb-0">Pengumuman Resmi</p>
                                    <small class="text-muted">Produk Dihentikan</small>
                                </div>
                            </div>

                            <!-- Kolom 3 -->
                            <div class="col-12 col-md-4">
                                <div class="p-3 bg-light rounded-3 h-100">
                                    <h3 class="text-primary">2024</h3>
                                    <p class="mb-0">Warisan Teknologi</p>
                                    <small class="text-muted">20 Tahun Sejarah</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
