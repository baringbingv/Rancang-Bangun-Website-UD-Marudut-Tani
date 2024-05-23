@extends('admin.layout.layoutadmin')

@section('title', 'Data Produk')

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk melakukan live search
            $('#search').keyup(function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr')    .filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

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
                        url: "/admin/produk/" + id,
                        type: "POST",
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Terhapus!',
                                name + ' telah terhapus.',
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
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 30px">Data Produk</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-center">
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $key => $value)
                    <tr class="text-center">
                        <td>{{ $loop->iteration + ($produk->currentPage() - 1) * $produk->perPage() }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->stok }}</td>
                        <td>{{ $value->kategori->kategori }}</td>
                        <td>
                            <form action="/admin/produk/{{ $value->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    <a href="/admin/produk/{{ $value->id }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="/admin/produk/{{ $value->id }}/edit" class="btn btn-warning btn-sm ml-3 mr-3"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm delete" name="{{ $value->nama }}" id="{{ $value->id }}"><i class="fas fa-trash"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">Not Found Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $produk->links('vendor.pagination.bootstrap-4') }}
                </ul>
              </div>
        </div>
    </div>
</div>
@endsection

