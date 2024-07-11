@extends('admin.layouts-admin.main')

@section('title', 'Kelola Data Kejadian Banjir-SIG')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan Kejadian Banjir</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Kejadian Banjir</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-select" id="fiter-1">
                                        <option selected>Pilih...</option>
                                        <option value="1">Jumlah Kejadian</option>
                                        <option value="2">Jumlah Korban</option>
                                        <option value="3">Tertangani</option>
                                        <option value="4">Belum Tertangani</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-select" id="tahun">
                                        <option selected>Tahun</option>
                                        <option value="1">2022</option>
                                        <option value="2">2023</option>
                                        <option value="3">2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-filter">
                                    <a href="#" class="btn btn-success btn-sm">Filter</a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-cetak">
                                    <a href="#" class="btn btn-info btn-sm">Cetak</a>
                                </div>
                            </div>
                        </div>
                        <div id="chart-laporan"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [{
                    data: [44, 55, 41, 67, 22, 43, 21, 49, 33, 52, 13, 21, 44, 55, 41, 67, 22, 43, 21,
                        49, 33, 52, 13, 21
                    ] // nilai grafik batang
                }],
                chart: { // mengatur type dan tinggi grafik
                    type: 'bar',
                    height: 350
                },
                plotOptions: { // mengatur batang grafik, seperti orientasi dan lebar
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: { // menampilkan label data
                    enabled: false
                },
                stroke: { // mengatur garis tepi grafik batang
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: { // sumbu x (horizontal)
                    categories: ['Pesanggaran', 'Bangorejo', 'Purwoharjo', 'Tegaldlimo', 'Muncar', 'Cluring',
                        'Gambiran', 'Srono', 'Genteng', 'Glenmore', 'Kalibaru',
                        'Singojuruh', 'Rogojampi', 'Kabat', 'Glagah', 'Banyuwangi', 'Giri', 'Wongsorejo',
                        'Songgon', 'Sempu', 'Kalipuro', 'Tegalsari', 'Licin', 'Blimbingsari',
                    ],
                },
                yaxis: { // sumbu y (vertikal)
                    title: {
                        text: 'Kejadian'
                    }
                },
                fill: { // mengatur grafik batang
                    opacity: 1
                },
                tooltip: { // format tooltip saat pengguna mengarahkan mouse ke batang.
                    y: {
                        formatter: function(val) {
                            return val + " kejadian"
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-laporan"), options);
            chart.render();
        });
    </script>
@endsection
