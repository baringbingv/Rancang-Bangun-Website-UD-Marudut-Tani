@extends('layouts.layout')
@section('title', 'Home')
@section('navhead')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header animate__animated animate__FadeIn">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <h1 class="mb-1 display-5 text-primary animate__animated animate__backInDown">Menjual Berbagai Alat Pertanian dan Peternakan</h1>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative animate__animated animate__FadeIn" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{ URL::asset('asset/img/pupuk.png') }}" class="img-fluid w-100 h-100 rounded" alt="First slide">
                                    <a href="#" style="background-color: white; color: white; position: absolute; top: 90%">Pupuk</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{ URL::asset('asset/img/pakan.png') }}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" style="background-color: white; color: white; position: absolute; top: 90%">Pakan</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{ URL::asset('asset/img/pestisida.png') }}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" style="background-color: white; color: white; position: absolute; top: 90%">Pestisida</a>
                                </div>
                            </div>
                            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="reveal">
                <div class="container py-5">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4 animate__animated animate__backInLeft">
                            <div class="featurs-item text-center rounded bg-light p-4">
                                <div class="featurs-icon btn-square rounded-circle bg-secondary mb-4 mx-auto">
                                    <i class="fas fa-car-side fa-3x text-white"></i>
                                </div>
                                <div class="featurs-content text-center">
                                    <h5>Free Shipping</h5>
                                    <p class="mb-0">Safe and Fast Delivery</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 animate__animated animate__backInUp">
                            <div class="featurs-item text-center rounded bg-light p-4">
                                <div class="featurs-icon btn-square rounded-circle bg-secondary mb-4 mx-auto">
                                    <i class="fas fa-exchange-alt fa-3x text-white"></i>
                                </div>
                                <div class="featurs-content text-center">
                                    <h5>30 Day Return</h5>
                                    <p class="mb-0">30 day money guarantee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 animate__animated animate__backInRight">
                            <div class="featurs-item text-center rounded bg-light p-4">
                                <div class="featurs-icon btn-square rounded-circle bg-secondary mb-4 mx-auto">
                                    <i class="fa fa-phone-alt fa-3x text-white"></i>
                                </div>
                                <div class="featurs-content text-center">
                                    <h5>24/7 Support</h5>
                                    <p class="mb-0">Support every time fast</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Produk Kami</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                                @foreach ($AllKategori as $item)
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{ $item->kategori }}">
                                        <span class="text-dark" style="width: 130px;">{{ $item->kategori }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4 justify-content-center">
                                        @foreach ($AllProduk as $item)
                                        <div class="col-md-6 col-lg-4 col-xl-3 animate__animated animate__fadeInUp content-center" style="aspect-ratio: 3/4">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ URL::asset('produk/'. $item->gambar) }}" class="img-fluid w-100 rounded-top" alt=""  style="aspect-ratio: 3/2">                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $item->kategori }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $item->nama }}</h4>
                                                    <p>{{ $item->deskripsi }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($item->harga, 0) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $kategoriDariDatabase = \App\Models\Kategori::pluck('kategori')->toArray();
                            $kategoriKonten = [];
                            foreach ($kategoriDariDatabase as $kategori) {
                                $kategoriKonten[$kategori] = "$kategori";
                            }
                        @endphp
                       @foreach($kategoriKonten as $kategori => $konten)
                       @if($konten)
                           <div id="tab-{{ $kategori }}" class="tab-pane fade show p-0">
                               <div class="row g-4">
                                   @foreach($AllProduk->where('kategori', $kategori) as $item)
                                       <div class="col-md-6 col-lg-4 col-xl-3 animate__animated animate__fadeInUp">
                                           <div class="rounded position-relative fruite-item">
                                               <div class="fruite-img">
                                                   <img src="{{ URL::asset('produk/'. $item->gambar) }}" class="img-fluid w-100 rounded-top" alt="" style="aspect-ratio: 3/2">
                                               </div>
                                               <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $item->kategori }}</div>
                                               <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                   <h4>{{ $item->nama }}</h4>
                                                   <p>{{ $item->deskripsi }}</p>
                                                   <div class="d-flex justify-content-between flex-lg-wrap">
                                                       <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($item->harga, 0) }} </p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                           </div>
                       @endif
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

        <!-- Testimonial Start -->
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="testimonial-header text-center">
                    <h4 class="text-primary">Our Testimonial</h4>
                    <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($AllTestimonial as $item)
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">{{ $item->deskripsi }}</p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="{{ URL::asset('testimonial/'. $item->foto) }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark m-0 pb-3">{{ $item->nama }}</h4>
                                    <p class="text-dark m-0 pb-3">{{ $item->email }}</p>
                                    <p class="m-0 pb-3"></p>
                                    <div class="d-flex pe-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Tastimonial End -->
@section('footer')
@endsection
