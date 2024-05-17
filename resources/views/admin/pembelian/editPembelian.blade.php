@extends('admin.layout.layoutadmin')
@section('title', 'Update Pembelian')
@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
          <h1 class="card-title" style="font-size: 30px">Edit Pemesanan</h1>
        </div>
        <form action="/admin/pembelian/{{$pembelian->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label class="nama">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" value="{{ $pembelian->produk->nama }}" disabled>
                </div>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="nama">Harga</label>
                    <input type="number" class="form-control" name="nama" value="{{ $pembelian->produk->harga }}" disabled>
                </div>
                @error('harga')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" value="{{ $pembelian->jumlah }}">
                </div>
                @error('jumlah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-success mt-5 mr-4"><i class="fas fa-check"></i> Ubah</button>
                <a href="/admin/pembelian" class="btn btn-danger mt-5"><i class="fas fa-times"></i> Batalkan</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
