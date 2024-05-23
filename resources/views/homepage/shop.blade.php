@extends('layouts.layout')
@section('title', 'Produk')
@push('script')
<script>
    const searchInput = document.querySelector('#search');
    const productItems = document.querySelectorAll('.col-lg-6');

    searchInput.addEventListener('keyup', function(event) {
        const searchTerm = event.target.value.toLowerCase();

        productItems.forEach(function(item) {
            const productNames = item.querySelectorAll('h4, h6');
            let matchFound = false;

            productNames.forEach(function(productName) {
                const productNameText = productName.textContent.toLowerCase();
                if (productNameText.includes(searchTerm)) {
                    matchFound = true;
                }
            });

            if (matchFound) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endpush
@section('navhead')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">PRODUK </h1>
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
                                        <h5>Kategori</h5>
                                        <ul class="list-unstyled fruite-categorie nav nav-pills flex-column mb-3">
                                            @php
                                                $jumlahData = $AllProduk->count();
                                            @endphp
                                            <li class="nav-item">
                                                <a class="nav-link active" id="tab-1-link" data-bs-toggle="pill" href="#tab"><i class="fas fa-leaf me-2"></i>All Products <span class="text-secondary">({{ $jumlahData }})</span></a>
                                            </li>
                                            @foreach ($AllKategori as $item)
                                            @php
                                                $jumlahData = $AllProduk->where('kategori_id', $item->id)->count();
                                            @endphp
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab-{{ $item->kategori }}-link" data-bs-toggle="pill" href="#tab-{{ $item->id }}"><i class="fas fa-leaf me-2"></i>{{ $item->kategori }} <span class="text-secondary">({{ $jumlahData }})</span></a></a>
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
                                            <div id="tab" class="tab-pane fade show p-0 active">
                                                <div class="row g-12">
                                                    <div class="col-lg-12">
                                                        <div class="row g-12">
                                                            @foreach ($AllProduk as $item)
                                                            <div class="col-md-6 col-lg-6 col-xl-4 mb-5 col-lg-6">
                                                                <div class="rounded position-relative fruite-item animate__animated animate__zoomInUp">
                                                                    <div class="fruite-img">
                                                                        <img src="{{ URL::asset('produk/'. $item->gambar) }}" class="img-fluid w-100 rounded-top" alt="" style="aspect-ratio: 3/2">
                                                                    </div>
                                                                    <h6 class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $item->kategori->kategori }}</h6>
                                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                        <h4>{{ $item->nama }}</h4>
                                                                        <p>{{ $item->deskripsi }}</p>
                                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                                            <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($item->harga, 0) }}</p>
                                                                            @if( $item->stok  <= 0)
                                                                                <p class="px-2 text-secondary"> Stok: Habis</p>
                                                                            @else
                                                                                <p class="px-3"> Stok: {{ $item->stok }}</p>
                                                                            @endif
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
                                                $kategoriDariDatabase = \App\Models\Kategori::pluck('id')->toArray();
                                                $kategoriKonten = [];
                                                foreach ($kategoriDariDatabase as $kategori) {
                                                    $kategoriKonten[$kategori] = "$kategori";
                                                }
                                            @endphp
                                        @foreach($kategoriKonten as $kategori => $konten)
                                        @if($konten)
                                            <div id="tab-{{ $kategori }}" class="tab-pane fade">
                                                <div class="row g-12">
                                                    <div class="col-lg-12">
                                                        <div class="row g-12">
                                                            @foreach($AllProduk->where('kategori_id', $kategori) as $item)
                                                                <div class="col-md-6 col-lg-6 col-xl-4 mb-5 col-lg-6 fruite-item" id="{{ $item->kategori }}">
                                                                    <div class="rounded position-relative animate__animated animate__zoomInUp">
                                                                        <div class="fruite-img">
                                                                            <img src="{{ URL::asset('produk/'. $item->gambar) }}" class="img-fluid w-100 rounded-top" alt="" style="aspect-ratio: 3/2">
                                                                        </div>
                                                                        <h6 class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $item->kategori->kategori }}</h6>
                                                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                            <h4>{{ $item->nama }}</h4>
                                                                            <p>{{ $item->deskripsi }}</p>
                                                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                                                <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($item->harga, 0) }}</p>
                                                                                @if( $item->stok  <= 0)
                                                                                    <p class="px-2 text-secondary"> Stok: Habis</p>
                                                                                @else
                                                                                    <p class="px-3"> Stok: {{ $item->stok }}</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
    <!-- Fruits Shop End-->
    @endsection
