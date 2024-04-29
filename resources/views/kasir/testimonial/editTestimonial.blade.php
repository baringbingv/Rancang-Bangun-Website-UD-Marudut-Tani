@extends('kasir.layout.layoutkasir')

@section('title', 'Update Testimonial')

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
          <h1 class="card-title" style="font-size: 30px">Data Testimonial</h1>
        </div>
        <form action="/kasir/testimonial/{{$testimonial->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label class="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $testimonial->nama }}">
                </div>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="email">E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ $testimonial->email }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="{{ $testimonial->deskripsi }}">
                </div>
                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success mt-5 mr-4"><i class="fas fa-check"></i> Ubah</button>
                <a href="/kasir/testimonial" class="btn btn-danger mt-5"><i class="fas fa-times"></i> Batalkan</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
