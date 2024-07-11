@extends('admin.layout-admin.main')

@section('title', 'Data User-SIG')

@section('content')
    {{-- Get data API --}}
    <?php
    $url = 'http://127.0.0.1:8000/api/users'; // Sesuaikan dengan URL API Anda
    $ch = curl_init($url); // Inisialisasi curl endpoint
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // mengatur agar hasil dari curl_exec() dikembalikan sebagai string
    
    $response = curl_exec($ch); // Mendapatkan hasil dari endpoint API
    curl_close($ch); // Tutup curl setelah selesai mengambil data dari endpoint API

    $data = json_decode($response);

    // Memastikan ada data yang diterima dari API
    if ($data && isset($data->data)) {
        $users = $data->data; // Data users dari API
    } else {
        $users = []; // Jika tidak ada data, inisialisasi sebagai array kosong
    }
    ?>

    <div class="page-heading">
        <h3></h3>
    </div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data User</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    {{-- button tambah --}}
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <div class="button-tmb">
                                <a href="insert_user" class="btn btn-primary btn-sm">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    {{-- tabel --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-user">
                            <thead>
                                <tr>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Lembaga</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">No Telepon</th>
                                    {{-- <th class="text-center">Jenis User</th> --}}
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nama_asli }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->lembaga }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    {{-- <td>Relawan</td> --}}
                                    <td valign="middle">
                                        <div class="button-container">
                                            <a href="/e_user" class="btn btn-warning btn-sm" title="Edit">
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
