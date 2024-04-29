@extends('kasir.layout.layoutkasir')

@section('title', 'Data ' .$pembelian->created_at)

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary w-75 ml-5 mt-2">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 40px">{{ $pembelian->created_at }}</h1>
        </div>
        <div class="container">
            <table id="w0" class="table table-condensed detail-view w-75">
                <tbody>
                    <tr>
                        <th>Tanggal Pembelian</th>
                        <td>{{ $pembelian->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Nama Produk</th>
                        <td>{{ $pembelian->produk->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $pembelian->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp. {{ number_format($pembelian->produk->harga), 0}}</td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>Rp. {{ number_format($pembelian->jumlah * $pembelian->produk->harga),0 }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="/admin/pembelian" class="btn btn-info btn-sm mt-5 mr-5 mb-2">Kembali</a>
        </div>
    </div>
</div>
@endsection

