@extends('admin.layout.layoutadmin')

@section('title', 'View Produk')

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary w-75 ml-5 mt-2">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 40px">{{ $kategori->kategori }}</h1>
        </div>
        <div class="container">
            <table id="w0" class="table table-condensed detail-view w-75">
                <tbody>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $kategori->kategori }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $kategori->deskripsi }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="/admin/kategori" class="btn btn-info btn-sm mt-5 mr-5 mb-2">Kembali</a>
        </div>
    </div>
</div>
@endsection
