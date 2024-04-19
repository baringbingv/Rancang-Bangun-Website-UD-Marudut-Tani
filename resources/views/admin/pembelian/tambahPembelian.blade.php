@extends('admin.layout.layoutadmin')

@section('title', 'Tambah Pembelian')

@push('script')
<script>
    $(document).ready(function() {
        $('#jumlahProduk').change(function() {
            var numPembelian = $(this).val();
            var html = '';
            for (var i = 2; i <= numPembelian; i++) {
                html += '<div class="form-group row">';
                html += '<label for="produk_id" class="col-sm-1 col-form-label">Produk ' + i + '</label>';
                html += '<div class="col-sm-4">'
                html += '<select name="produk_id[]" id="produk_id[]" class="custom-select form-control-border" value="{{ old('produk_id[]') }}">';
                html += '<option value="">--Pilih Produk--</option>';
                html += '@foreach ($produk as $item)';
                html += '<option value="{{ $item->id }}">{{ $item->nama }}</option>';
                html += '@endforeach';
                html += '</select>';
                html += '</div>';
                html += '<label for="jumlah" class="col-sm-3 col-form-label text-right">Jumlah</label>';
                html += '<div class="col-sm-1">'
                html += '<input type="int" class="form-control" name="jumlah[]">';
                html += '</div>';
                html += '</div>';
            }
            $('#additionalFields').html(html);
        });
    });

</script>
@endpush

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-5 mt-2" style="width: 90%">
        <div class="card-header">
          <h3 class="card-title">Data Produk</h3>
        </div>
        <form action="/admin/pembelian" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="jumlahProduk">Jumlah Produk</label>
              <select class="form-control" id="jumlahProduk" name="jumlahProduk">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
            <div id="pembelian">
                <div class="form-group row">
                    <label for="produk" class="col-sm-1 col-form-label">Produk 1</label>
                    <div class="col-sm-4">
                        <select name="produk_id[]" id="produk_id[]" class="custom-select form-control-border">
                            <option value="">--Pilih Produk--</option>
                            @foreach ($produk as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="jumlah" class="col-sm-3 col-form-label text-right">Jumlah</label>
                    <div class="col-sm-1">
                        <input type="int" class="form-control" name="jumlah[]">
                    </div>
                </div>
            </div>
            <div id="additionalFields"></div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
@endsection

