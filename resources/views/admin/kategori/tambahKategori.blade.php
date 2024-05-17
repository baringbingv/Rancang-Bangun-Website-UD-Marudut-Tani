@extends('admin.layout.layoutadmin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 30px">Tambah Kategori</h1>
        </div>
        <form action="/admin/kategori" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="kategori">Kategori</label>
              <input type="text" class="form-control" id="kategori" name="kategori" @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}">
            </div>
            @error('kategori')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
