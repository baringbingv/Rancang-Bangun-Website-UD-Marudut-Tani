@extends('admin.layout.layoutadmin')

@section('title', 'Dashboard')

@push('script')
<script>
    var ctx = document.getElementById('sales-chart-canvas').getContext('2d');

    // Data dari controller
    var labels = {!! json_encode($labels) !!};
    var data = {!! json_encode($totalPenjualanPerBulan) !!};

    var salesData = {
        labels: labels,
        datasets: [{
            label: 'Penjualan',
            data: data,
            backgroundColor: 'rgba(60, 141, 188, 0.1)',
            borderColor: 'rgba(60, 141, 188, 0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60, 141, 188, 1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60, 141, 188, 1)',
            borderWidth: 2
        }]
    };

    var salesChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d');
    var salesChart = new Chart(salesChartCanvas, {
        type: $('canvas').data('chart-type'),
        data: salesData,
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Bulan'
                    }
                },
                y: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Penjualan'
                    }
                }
            }
        }
    });
</script>
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4><i class="fa fa-calendar"></i> &nbsp;<?php echo date('l - d F Y'); ?></h4>
                </div>
                <div class="col-sm-6">
                    <h1 class="m-0 text-right">Dashboard</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $JumlahProduk }}</h3>
                            <p>Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/admin/produk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $PenjualanPerHari }}</h3>
                            <p>Penjualan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill-wave"></i>
                        </div>
                        <a href="/admin/penjualan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $JumlahKasir }}</h3>
                            <p>Kasir</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/admin/kasir" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $JumlahKategori }}</h3>
                            <p>Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="/admin/kategori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-money-bill-wave mr-1"></i>
                                Penjualan
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#sales-chart" data-toggle="tab">Grafik Penjualan</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="tab-pane active" id="sales-chart">
                                    <canvas id="sales-chart-canvas" height="100" data-chart-type="line" data-chart-dataset-source="salesData"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('styles')
    <style>
        @media (max-width: 320px) {
            #sales-chart-canvas {
                width: 100% !important;
                max-width: 100% !important;
                height: 200% !important;
                max-height: 200% !important;
            }
        }
    </style>
@endpush
