@extends('admin.layout.layoutadmin')

@section('title', 'Data ' .$kasir->nama)

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary w-75 ml-5 mt-2">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 40px">{{ $kasir->nama }}</h1>
        </div>
        <div class="container">
            <table id="w0" class="table table-condensed detail-view w-75">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $kasir->nama }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $kasir->username }}</td>
                    </tr>
                    <tr>
                        <th>Tempat / Tanggal Lahir</th>
                        <td>{{ $kasir->tempatLahir }} / {{ $kasir->tanggalLahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $kasir->jenisKelamin }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $kasir->agama }}</td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td>{{ $kasir->noTelp }}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>{{ $kasir->email}}</td>
                    </tr>
                    </tbody>
            </table>
            <div id="grid-system2" class="col-sm-3">
                <div class="box box-solid ">
                    <div id="grid-system2-body" class="box-body">
                        <img src="{{ URL::asset('kasir/foto/'. $kasir->foto) }}" class="img-thumbnail" width="500">
                    </div>
                </div>
            </div>
            <a href="/admin/kasir" class="btn btn-info btn-sm mt-5 mr-5 mb-2">Kembali</a>
        </div>
    </div>
</div>
@endsection
