@extends('kasir.layout.layoutkasir')

@section('title', 'Tambah Testimonial')

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
          <h3 class="card-title">Data Testimonial</h3>
        </div>
        <form action="/admin/testimonial" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Pelanggan</label>
              <input type="text" class="form-control" id="nama" name="nama" @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            @error('foto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control cols="30" rows="10" @error('nama') is-invalid @enderror"></textarea>
            </div>
            @error('deskripsi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
@endsection

