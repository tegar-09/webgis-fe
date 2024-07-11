@extends('admin.layout-admin.main')

@section('title', 'Kelola Data Kejadian Banjir-SIG')

@section('content')
    {{-- Get data API --}}
    <?php
    $url = 'http://127.0.0.1:8000/api/kejadian'; // Endpoint API akan diambil datanya
    $ch = curl_init($url); // Inisialisasi curl endpoint
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // mengatur agar hasil dari curl_exec() dikembalikan sebagai string

    $response = curl_exec($ch); // Mendapatkan hasil dari endpoint API
    curl_close($ch); // Tutup curl setelah selesai mengambil data dari endpoint API

    $data = json_decode($response);

    // Pastikan ada data yang diterima dari API
    if ($data && isset($data->data)) {
        $kejadian = $data->data; // Data kejadian dari API
    } else {
        $kejadian = []; // Jika tidak ada data, inisialisasi sebagai array kosong
    }
    ?>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Kejadian Banjir</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kejadian Banjir</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="col-auto">
                    <div class="btn-cetak">
                        <a href="#" class="btn btn-info btn-sm">Cetak</a>
                    </div>
                </div>
                {{-- Tabel --}}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table-kejadian">
                        <thead>
                            <tr>
                                <th class="text-center">Jenis Bencana</th>
                                <th class="text-center">Alamat Kejadian</th>
                                <th class="text-center">Tanggal Waktu</th>
                                <th class="text-center">Kronologi</th>
                                <th class="text-center">Penyebab</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kejadian as $item)
                            <tr>
                                <td class="text-center">{{ $item->jenis_bencana }}</td>
                                <td>{{ $item->alamat_kejadian }}</td>
                                <td>{{ $item->tanggal_kejadian }}</td>
                                <td>
                                    <p class="text-preview">{{ $item->kronologi }}</p>
                                    <a href="#" data-id="{{ $item->id }}" class="btn-show-details">Lanjut</a>
                                </td>
                                <td>
                                    <p class="text-preview">{{ $item->penyebab_kejadian }}</p>
                                    <a href="#" data-id="{{ $item->id }}" class="btn-show-details">Lanjut</a>
                                </td>
                                <td>
                                    <div class="button-container">
                                        <a href="/detail_kejadian/{{ $item->id }}" class="btn btn-success btn-sm" title="Detail">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="/e_kejadian/{{ $item->id }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit" style="color: white"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="pagination-container">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-primary justify-content-end">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
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

    <!-- Modal Box -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalContent"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-kembali btn-sm" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Script JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets-admin/compiled/js/kejadian.js') }}"></script>
    
@endsection
