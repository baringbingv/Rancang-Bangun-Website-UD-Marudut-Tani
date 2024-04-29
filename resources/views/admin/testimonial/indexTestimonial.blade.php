@extends('admin.layout.layoutadmin')

@section('title', 'Data Testimonial')

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
                        url: "/admin/testimonial/" + id,
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
    <div class="card card-primary ml-3 mt-2" style="width: 90%">
        <div class="card-header">
            <h1 class="card-title" style="font-size: 30px">Data Testimonial</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonial as $key => $value)
                    <tr class="text-center">
                        <td>{{ $loop->iteration + ($testimonial->currentPage() - 1) * $testimonial->perPage() }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                        <td>
                            <form action="/admin/testimonial/{{ $value->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/admin/testimonial/{{ $value->id }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
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
                    {{ $testimonial->links('vendor.pagination.bootstrap-4') }}
                </ul>
              </div>
        </div>
    </div>
</div>
@endsection

