@extends('admin.layout.layoutadmin')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
          <h1 class="card-title" style="font-size: 30px">Tambah Produk</h1>
        </div>
        <form action="/admin/produk" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Produk</label>
              <input type="text" class="form-control" id="nama" name="nama" @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="int" class="form-control" id="stok" name="stok" @error('stok') is-invalid @enderror" value="{{ old('stok') }}">
            </div>
            @error('stok')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="int" class="form-control" id="harga" name="harga" @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
            </div>
            @error('harga')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="kategori">Kategori :</label>
                <select name="kategori" id="kategori" class="custom-select form-control-border" value="{{ old('kategori') }}">
                    <option value="">--Pilih Kategori--</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                    @endforeach
                </select>
            @error('kategori')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}">
            </div>
            @error('deskripsi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
@endsection

