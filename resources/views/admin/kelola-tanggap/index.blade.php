@extends('admin.layout-admin.main')

@section('title', 'Data Penanganan-SIG')

@section('content')
    <?php
    $url = 'http://127.0.0.1:8000/api/penanganan'; // Endpoint API yang ingin Anda ambil datanya
    $ch = curl_init(); // Inisialisasi curl

    // Set URL dan opsi curl
    curl_setopt($ch, CURLOPT_URL, $url); // menetapkan URL dari endpoint API yang ingin diambil datanya.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // mengatur agar hasil dari curl_exec() dikembalikan sebagai string

    $jsonData = curl_exec($ch); // Mendapatkan hasil dari endpoint API

    // Memeriksa apakah ada error saat menjalankan curl
    if(curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch); // Tutup curl setelah selesai mengambil data dari endpoint API

    $data = json_decode($jsonData, true); // Mengubah string JSON menjadi array PHP
    ?>

    <div class="page-heading">
        <h3></h3>
    </div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Tanggap Bencana</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tanggap Bencana</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <div class="button-tmb">
                                <a href="t_tanggap" class="btn btn-primary btn-sm">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    {{-- tabel --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-tanggap">
                            <thead>
                                <tr>
                                    <th class="text-center">Id Kejadian/Desa</th>
                                    <th class="text-center">Korban</th>
                                    <th class="text-center">Unsur yang Terlibat</th>
                                    <th class="text-center">Penanganan</th>
                                    <th class="text-center">Dampak</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $item): ?>
                                <tr>
                                    <td class="text-center">{{ $item['id_kejadian'] }}</td>
                                    <td>
                                        <div class="status-korban">
                                            <div class="status-item">
                                                Hilang : <span class="value">{{ $item['korban']['hilang'] }}</span>
                                            </div>
                                            <div class="status-item">
                                                Meninggal: <span class="value">{{ $item['korban']['meninggal'] }}</span>
                                            </div>
                                            <div class="status-item">
                                                Terluka : <span class="value">{{ $item['korban']['terluka'] }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item['keterangan']['unsur_terlibat'] }}</td>
                                    <td>{!! nl2br(e($item['penanganan'])) !!}</td>
                                    <td>{!! nl2br(e($item['keterangan']['dampak'])) !!}</td>
                                    <td>
                                        <div class="button-container">
                                            <a href="/e_tanggap/{{ $item['id'] }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit" style="color: white"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                {{-- <tr>
                                    <td class="text-center">1/Karangrejo</td>
                                    <td>
                                        <div class="status-korban">
                                            <div class="status-item">
                                                Hilang : <span class="value"> 10</span>
                                            </div>
                                            <div class="status-item">
                                                Meninggal: <span class="value">15</span>
                                            </div>
                                            <div class="status-item">
                                                Terluka : <span class="value">30</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">TRC BPBD, relawan dan masyarakat</td>
                                    <td>1. TRC BPBD melakukan pembersihan di saluran yang tersumbat
                                        <br>
                                        2. TRC BPBD melakukan kaji cepat dan pendataan pada warga yang terdampak
                                    </td>
                                    <td>Aliran air masuk ke pemukiman warga dengan ketinggian kurang lebih 35 cm dan 100 KK
                                        terdampak</td>
                                    <td valign="middle">
                                        <div class="button-container">
                                            <a href="/e_tanggap" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit" style="color: white"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    {{-- pagination --}}
                    <div class="pagination-container">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-primary justify-content-end">
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</i></span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">2</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
