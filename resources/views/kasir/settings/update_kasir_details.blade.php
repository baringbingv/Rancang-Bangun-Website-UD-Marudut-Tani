@extends('kasir.layout.layoutkasir')

@section('title', 'Update Profile')

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y');?></h4>
    </div>
    <div class="card card-primary w-75 ml-5 mt-2">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 30px"><i class="fas fa-pencil-alt"></i> Edit Profil</h1>
        </div>
        <form class="forms-sample" action="{{ url('kasir/update-kasir-details') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container mt-3">
                <div class="form-group">
                    <label class="control-label col-md-4" for="nama">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" id="nama" class="form-control" name="nama" value="{{ Auth::guard('kasir')->user()->nama }}" placeholder="Nama Lengkap" >
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="tempatLahir">Tempat Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" id="tempatLahir" class="form-control" name="tempatLahir" value="{{ Auth::guard('kasir')->user()->tempatLahir }}" placeholder="Tempat Lahir" >
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="tanggalLahir">Tanggal Lahir</label>
                    <div class="col-sm-8">
                        <input type="date" id="tanggalLahir" class="form-control" name="tanggalLahir" value="{{ Auth::guard('kasir')->user()->tanggalLahir }}" placeholder="Tanggal Lahir" >
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="jenisKelamin">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="Laki-Laki" {{ Auth::guard('kasir')->user()->jenisKelamin == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ Auth::guard('kasir')->user()->jenisKelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="agama">Agama</label>
                    <div class="col-sm-8">
                        <select name="agama" id="agama" class="form-control">
                            <option value="">-- Agama --</option>
                            <option value="Islam" {{ Auth::guard('kasir')->user()->agama == "Islam" ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ Auth::guard('kasir')->user()->agama == "Kristen" ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ Auth::guard('kasir')->user()->agama == "Katolik" ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ Auth::guard('kasir')->user()->agama == "Hindu" ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ Auth::guard('kasir')->user()->agama == "Buddha" ? 'selected' : '' }}>Buddha</option>
                            <option value="Kong Hu Cu" {{ Auth::guard('kasir')->user()->agama == "Kong Hu Cu" ? 'selected' : '' }}>Kong Hu Cu</option>
                            <option value="Lainnya" {{ Auth::guard('kasir')->user()->agama == "Lainnya" ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="email">Email</label>
                    <div class="col-sm-8">
                        <input type="email" id="email" class="form-control" name="email" value="{{ Auth::guard('kasir')->user()->email }}" placeholder="Email" >
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="noTelp">No Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" id="noTelp" class="form-control" name="noTelp" value="{{ Auth::guard('kasir')->user()->noTelp }}" placeholder="No Telepon" maxlength="12" minlength="11">
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}" style="width: 66%;"> <br>
                    @if (!empty(Auth::guard('kasir')->user()->foto))
                        <a class="btn btn-info bg-primary btn-sm" target="_blank"
                            href="{{ URL::asset('kasir/foto/' . Auth::guard('kasir')->user()->foto) }}">View
                            Gambar</a>
                        <input type="hidden" name="current_kasir_foto"
                            value="{{ Auth::guard('kasir')->user()->foto }}">
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="alamat">Alamat</label>
                    <div class="col-sm-8">
                        <textarea name="alamat" id="alamat" value="{{ Auth::guard('kasir')->user()->alamat }}" placeholder="Alamat" cols="28" rows="3"></textarea>
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
