@extends('admin.layout.layoutadmin')

@section('title', 'Data Pembelian')

@push('script')
    <script>
        $(document).ready(function() {
            var originalIndexes = [];
            $('#pembelian_table tbody tr').each(function(index) {
                originalIndexes.push(index);
            });

            $('#search-date').change(function() {
                var selectedDate = $(this).val();
                var currentIndex = 0;
                $('#pembelian_table tbody tr').each(function(index) {
                    if (selectedDate === '') {
                        $(this).show();
                        $(this).find('td:eq(0)').text(originalIndexes[index] + 1);
                    } else {
                        var rowDate = $(this).find('td:eq(1)').text();
                        if (rowDate.trim() === selectedDate) {
                            $(this).show();
                            $(this).find('td:eq(0)').text(currentIndex + 1);
                            currentIndex++;
                        } else {
                            $(this).hide();
                        }
                    }
                });
            })
        });


        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var name = $(this).attr('name');
            Swal.fire({
                title: 'Hapus ' + name + '?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                showLoaderOnConfirm: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/pembelian/" + id,
                        type: "POST"    ,
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Terhapus!',
                                'Item telah terhapus.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                    });
                }
            });
        });
    </script>
@endpush

@section('content')
<div class="container-100 content-wrapper">
    <section class="content">
    <div class="card-header">
        <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
    </div>
    <div class="card card-primary ml-5 mt-2" style="width: 90%">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 30px">Data Pembelian</h1>
        </div>
        <div class="container mt-3 mb-3 ml-5">
            <div class="row ml-5">
                <div class="col-lg-1 mt-2">
                    <span class="fas fa-filter text-secondary" style="font-size: 20px">Filter:</span>
                </div>
                <div class="col-lg-2">
                    <input type="date" id="search-date" class="form-control" placeholder="Cari berdasarkan tanggal pembelian...">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="pembelian_table">
                <thead>
                    <tr class="text-center">
                        <th style="width: 10px">No</th>
                        <th>Tanggal Pembelian</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembelian as $index => $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration + ($pembelian->currentPage() - 1) * $pembelian->perPage() }}</td>
                            @csrf
                            <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                            <td>
                                Rp. {{ number_format(
                                    $item->jumlah * $item->produk->harga,
                                    2
                                ) }}
                            </td>
                            <td>
                                <form action="/admin/pembelian/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/pembelian/{{ $item->id }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="/admin/pembelian/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-3 mr-3"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm delete" name="{{ $item->nama }}" id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($pembelian->isEmpty())
                        <tr>
                            <td colspan="4">Not Found Data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $pembelian->links('vendor.pagination.bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

