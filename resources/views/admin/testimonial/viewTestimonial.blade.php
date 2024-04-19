@extends('admin.layout.layoutadmin')

@section('title', 'Data Pelanggan ' .$testimonial->nama)

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary w-75 ml-5 mt-2">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 40px">{{ $testimonial->nama }}</h1>
        </div>
        <div class="container">
            <table id="w0" class="table table-condensed detail-view w-75">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $testimonial->nama }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $testimonial->deskripsi }}</td>
                    </tr>
                </tbody>
            </table>
            <div id="grid-system2" class="col-sm-3">
                <div class="box box-solid ">
                    <div id="grid-system2-body" class="box-body">
                        <img src="{{ URL::asset('testimonial/'. $testimonial->foto) }}" class="img-thumbnail" width="500">
                    </div>
                </div>
            </div>
            <a href="/admin/testimonial" class="btn btn-info btn-sm mt-5 mr-5 mb-2">Kembali</a>
        </div>
    </div>
</div>
@endsection
