@extends('kasir.layout.layoutkasir')

@section('title', 'Data ' .Auth::guard('kasir')->user()->nama)

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary w-75 ml-5 mt-2">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 30px">Profil {{Auth::guard('kasir')->user()->nama}}</h1>
            <ul class="navbar-nav ml-auto float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog" style="font-size: 20px"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-dark" href="{{ url('/kasir/update-kasir-details') }}">Update Data</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="container">
            <table id="w0" class="table table-condensed detail-view w-75">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>{{ Auth::guard('kasir')->user()->nama }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ Auth::guard('kasir')->user()->username }}</td>
                    </tr>
                    <tr>
                        <th>Tempat / Tanggal Lahir</th>
                        <td>{{ Auth::guard('kasir')->user()->tempatLahir }} / {{ Auth::guard('kasir')->user()->tanggalLahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ Auth::guard('kasir')->user()->jenisKelamin }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ Auth::guard('kasir')->user()->agama }}</td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td>{{ Auth::guard('kasir')->user()->noTelp }}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>{{ Auth::guard('kasir')->user()->email }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ Auth::guard('kasir')->user()->alamat }}</td>
                    </tr>
                    </tbody>
            </table>
            <div id="grid-system2" class="col-sm-3">
                <div class="box box-solid ">
                    <div id="grid-system2-body" class="box-body">
                        <img src="{{ asset('kasir/foto/' . Auth::guard('kasir')->user()->foto) }}" class="img-thumbnail" width="500">
                    </div>
                </div>
            </div>
            <a href="/kasir/dashboard" class="btn btn-info btn-sm mt-5 mr-5 mb-2">Kembali</a>
        </div>
    </div>
</div>
@endsection
