@extends('layouts.layout')
@section('title', 'Shop')
@section('navhead')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">SHOP</h1>
</div>
<!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3 animate__animated animate__lightSpeedInLeft" placeholder="keywords" aria-describedby="search-icon-1" id="search">
                                <span id="search-icon-1" class="input-group-text p-3 animate__animated animate__lightSpeedInLeft"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3 animate__animated animate__lightSpeedInLeft mt-5">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Kategori</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach ($AllKategori as $item)
                                            @php
                                                $jumlahData = $AllProduk->where('kategori', $item->kategori)->count();
                                            @endphp
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>{{ $item->kategori }}</a>
                                                    <span>({{ $jumlahData }})</span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="container-fluid fruite py-12">
                                <div class="container py-1">
                                    <div class="tab-class text-center">
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                <div class="row g-12">
                                                    <div class="col-lg-12">
                                                        <div class="row g-12">
                                                            @foreach ($AllProduk as $item)
                                                            <div class="col-md-6 col-lg-6 col-xl-4 mb-5" id="produk">
                                                                <div class="rounded position-relative fruite-item animate__animated animate__zoomInUp">
                                                                    <div class="fruite-img">
                                                                        <img src="{{ URL::asset('produk/'. $item->gambar) }}" class="img-fluid w-100 rounded-top" alt="">
                                                                    </div>
                                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $item->kategori }}</div>
                                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                        <h4>{{ $item->nama }}</h4>
                                                                        <p>{{ $item->deskripsi }}</p>
                                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                                            <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($item->harga, 3) }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
    @endsection

