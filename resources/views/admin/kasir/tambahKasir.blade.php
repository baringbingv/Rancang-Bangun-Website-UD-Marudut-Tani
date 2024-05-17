@extends('admin.layout.layoutadmin')

@section('title', 'Tambah Kasir')

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
          <h3 class="card-title" style="font-size: 30px">Tambah Kasir</h3>
        </div>
        <form action="/admin/kasir" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Kasir</label>
              <input type="text" class="form-control" id="nama" name="nama" @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" @error('username') is-invalid @enderror" value="{{ old('username') }}">
            </div>
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" name="password" @error('password') is-invalid @enderror" value="{{ old('password') }}">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
                  <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
@endsection

