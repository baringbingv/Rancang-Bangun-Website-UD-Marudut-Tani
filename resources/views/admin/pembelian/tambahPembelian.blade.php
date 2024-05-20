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
                html += '<label for="jumlah" class="col-sm-2 col-form-label text-right">Jumlah</label>';
                html += '<div class="col-sm-1">'
                html += '<input type="int" class="form-control" name="jumlah[]">';
                html += '</div>';
                html += '<label for="harga" class="col-sm-2 col-form-label text-right">Harga</label>';
                html += '<div class="col-sm-1">'
                html += '<input type="int" class="form-control" name="harga[]">';
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
          <h3 class="card-title"  style="font-size: 30px">Tambah Pemesanan</h3>
        </div>
        <form action="/admin/pembelian" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="jumlahProduk">Jumlah Produk</label>
              <select class="form-control" id="jumlahProduk" name="jumlahProduk">
                @for ($i = 1; $i <= 30; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
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
                    <label for="jumlah" class="col-sm-2 col-form-label text-right">Jumlah</label>
                    <div class="col-sm-1">
                        <input type="int" class="form-control" name="jumlah[]">
                    </div>
                    <label for="Harga" class="col-sm-2 col-form-label text-right">Harga</label>
                    <div class="col-sm-1">
                        <input type="int" class="form-control" name="harga[]">
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

