@extends('admin.layout.layoutadmin')
@section('title', 'Ganti Password')
@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y');?></h4>
    </div>
    <div class="card card-primary w-75 ml-5 mt-2">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 30px"><i class="fas fa-lock"></i> Ganti Password</h1>
        </div>
        <form class="forms-sample" action="{{ url('admin/update-admin-password') }}" method="post">
            @csrf
            <div class="container mt-3">
                <div class="form-group">
                    <label class="control-label col-md-4" for="nama">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->nama }}" readonly=''>
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="current_password">Current Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" placeholder="Enter Current Password" id="current_password" name="current_password">
                        <p class="help-block help-block-error "></p>
                        <span id="check_password"></span>
                    </div>
                    @error('current_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="new_password">New Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" placeholder="Enter New Password" id="new_password" name="new_password">
                        <p class="help-block help-block-error "></p>
                    </div>
                    @error('new_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="confirm_password">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" placeholder="Enter Confirm Password" id="confirm_password" name="confirm_password">
                        <p class="help-block help-block-error "></p>
                    </div>
                    @error('confirm_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
