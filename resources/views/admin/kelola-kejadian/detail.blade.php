@extends('admin.layout-admin.main')

@section('title', 'Kelola Data Kejadian Banjir-SIG')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Data Kejadian Banjir</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Kejadian Banjir</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    {{-- tabel --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-detail">
                            <tbody>
                                <tr>
                                    <td>Nama Pelapor</td>
                                    <td>Siti Anisaul</td>
                                </tr>
                                <tr>
                                    <td>Jenis Bencana</td>
                                    <td>Banjir</td>
                                </tr>
                                <tr>
                                    <td>Nama Kejadian</td>
                                    <td>Banjir Genangan</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kejadian</td>
                                    <td>01/26/2024</td>
                                </tr>
                                <tr>
                                    <td>Waktu Kejadian</td>
                                    <td>15.30 WIB</td>
                                </tr>
                                <tr>
                                    <td>Alamat Kejadian</td>
                                    <td>Karanganom RT 01/RW 04 kelurahan Karangrejo, Banyuwangi</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>Banyuwangi</td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td>Karangrejo</td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>-8.2192</td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>114.3691</td>
                                </tr>
                                <tr>
                                    <td>Ketinggian Air</td>
                                    <td>90 m</td>
                                </tr>
                                <tr>
                                    <td>Penyebab Kejadian</td>
                                    <td>1. Hujan dengan intensitas deras mulai pukul 13.30 WIB yang menyebabkan air sungai
                                        naik
                                        <br>
                                        2. Sungai yang mengaliri di tengah permukiman warga tidam mampu menampung air dari
                                        sungai kali asin
                                        <br>
                                        3. Terdapat sumbatan pada jembatan
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kronologi Kejadian</td>
                                    <td>Pada hari Jumat tanggal 26 Januari 2024 pukul 13:00 WIB, terjadi hujan deras di
                                        wilayah
                                        Kecamatan Banyuwangi dan sekitarnya yang menyebabkan air di saluran irigasi naik dan
                                        masuk ke pemukiman warga</td>
                                </tr>
                                <tr>
                                    <td>Upaya Penanganan</td>
                                    <td>1. TRC BPBD melakukan pembersihan di saluran yang tersumbat
                                        <br>
                                        2. TRC BPBD melakukan kaji cepat dan pendataan pada warga yang terdampak
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dampak</td>
                                    <td>Aliran air masuk ke pemukiman warga dengan ketinggian kurang lebih 35 cm dan 100 KK
                                        terdampak</td>
                                </tr>
                                <tr>
                                    <td>Korban</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td class="nowrap">Unsur yang Terlibat</td>
                                    <td>TRC BPBD, relawan dan masyarakat</td>
                                </tr>
                                <tr>
                                    <td>Foto Kejadian</td>
                                    <td>
                                        <img src="{{ asset('assets-admin/compiled/jpg/kejadian-1.jpg') }}"
                                            class="foto-kejadian" style="width: 20%">
                                        <img src="{{ asset('assets-admin/compiled/jpg/kejadian-2.jpg') }}"
                                            class="foto-kejadian" style="width: 20%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
