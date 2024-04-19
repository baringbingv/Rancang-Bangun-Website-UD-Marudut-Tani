@extends('layouts.layout')
@section('title', 'About')
@section('navhead')
@section('content')
    <div class="container-fluid py-5 mb-5 hero-header animate__animated animate__FadeIn" style="background: none">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 col-lg-6">
                    <h1 class="mb-1 display-5 text-primary animate__animated animate__backInDown"> <span style="color: #ffb524"> 6 YEARS </span> IN THE AGRICULTURE BUSINESS</h1>
                </div>
                <img src="{{ URL::asset('asset/img/Pertanian-Indonesia.jpg') }}" class="img-fluid w-50 h-100 rounded animate__animated animate__backInDown position-relative top-100">
                <img src="{{ URL::asset('asset/img/plank.jfif') }}" class="img-fluid rounded animate__animated animate__slideInLeft position-relative mt-5" style="height: 1%; width: 50%; aspect-ratio: 4/3">
                <p class="w-50 wt-5 text-5 h3 animate__animated animate__slideInRight">
                    Awal mula dari UD Marudut Tani dimulai ketika tempat tersebut hanya merupakan sebuah rumah biasa dengan dua pintu yang sudah tidak lagi digunakan oleh pemiliknya.
                    Pada tahun 2009, sebuah keluarga menyewa rumah tersebut namun hanya menggunakan satu pintu, sehingga satu pintu lainnya tidak terpakai dan tidak ada yang berminat untuk menyewa.
                    Akibatnya, pemilik rumah memutuskan untuk menggunakan properti tersebut untuk usaha penjualan papan bunga.
                </p>
                <p class="w-50 wt-5 text-5 h3 animate__animated animate__slideInLeft">
                    Seiring berjalannya waktu, pada tahun 2018, kontrak dengan keluarga tersebut berakhir dan tidak diperpanjang.
                    Kemudian, pemilik rumah memutuskan untuk memulai usaha baru, dengan menggabungkan kedua pintu rumah tersebut menjadi satu untuk dijadikan usaha di bidang pertanian dan peternakan.
                    Pemilihan jenis usaha tersebut disebabkan karena lokasi yang sangat strategis, di mana daerah tersebut mayoritas dihuni oleh petani dan pekebun.
                </p>
                <img src="{{ URL::asset('asset/img/UDMT.png') }}" class="img-fluid rounded animate__animated animate__slideInLeft position-relative mt-5 float-right" style="height: 1%; width: 50%; aspect-ratio: 4/3">
            </div>
        </div>
    </div>
@section('footer')
@endsection
