@extends('admin.layout.layoutadmin')

@section('title', 'Tambah Penjualan')

@push('script')
<script>
    var totalHarga = 0;
    var jumlah = 0;
    var listItem = [];

    function tambahItem(){
        updateTotalHarga(parseInt($('#produk_id').find(':selected').data('harga')))
        var item = listItem.filter((el) => el.id === $('#produk_id').find(':selected').data('id'));
        if(item.length > 0){
            item[0].jumlah += 1
        }else{
            var item = {
                id: $('#produk_id').find(':selected').data('id'),
                nama: $('#produk_id').find(':selected').data('nama'),
                kategori: $('#produk_id').find(':selected').data('kategori'),
                harga: $('#produk_id').find(':selected').data('harga'),
                jumlah: 1,
            }
            listItem.push(item)
        }
        updateJumlah(1)
        updateTable()
    }

    function updateTotalHarga(nom){
        totalHarga += nom;
        $('[name=total_harga]').val(totalHarga)
        $('.totalHarga').html('Rp. ' + formatRupiah(totalHarga.toString()))
    }

    function updateJumlah(nom){
        jumlah += nom;
        $('.jumlah').html(formatRupiah(jumlah.toString()))
    }

    function updateTable(){
    var html = '';
    listItem.map((el,index) => {
        var harga = formatRupiah(el.harga.toString())
        var jumlah = formatRupiah(el.jumlah.toString())
        html += `
        <tr>
            <td>${index +1}</td>
            <td>${el.nama}</td>
            <td>${el.kategori}</td>
            <td>${jumlah}</td>
            <td>Rp. ${harga}</td>
            <td>
                <input type="hidden" name="produk_id[]" value="${el.id}" multiple>
                <input type="hidden" name="jumlah[]" value="${el.jumlah}" multiple>
                <button type="button" class="btn btn-danger" onclick="deleteItem(${index})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        `
    })
    $('.transaksiItem').html(html)
}

    function deleteItem(index){
        var item = listItem[index]
        if(item.jumlah > 1){
            listItem[index].jumlah -= 1;
            updateTotalHarga(-(item.harga))
            updateJumlah(-1)
        }
        else{
            listItem.splice(index,1)
            updateTotalHarga(-(item.harga * item.jumlah))
            updateJumlah(-(item.jumlah))
        }
        updateTable()
    }
</script>
@endpush

@section('content')
<div class="container-100 content-wrapper">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
          <h1 class="card-title" style="font-size: 30px">Tambah Penjualan</h1>
        </div>
        <form action="/admin/penjualan" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="nama_pembeli">Nama Pembeli</label>
                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" @error('nama_pembeli') is-invalid @enderror" value="{{ old('nama_pembeli') }}">
              </div>
              @error('nama_pembeli')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            <div id="penjualan">
                <div class="form-group row">
                    <label for="produk" class="col-sm-2 col-form-label">Daftar Produk</label>
                    <div class="col-sm-4">
                        <select name="produk_id[]" id="produk_id" class="custom-select form-control-border">
                            <option value="">--Pilih Produk--</option>
                            @foreach ($produk as $item)
                                <option value="{{ $item->id }}" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-kategori="{{ $item->kategori }}" data-harga="{{ $item->harga }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary d-block" onclick="tambahItem()">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="transaksiItem">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Jumlah</th>
                            <th class="jumlah">0</th>
                            <th class="totalHarga">Rp. 0</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
          </div>
          </div>
          <div class="card-footer">
            <input type="hidden" name="total_harga" value="0">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
</div>
@endsection
