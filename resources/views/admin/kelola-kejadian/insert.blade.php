@extends('user.layouts-user.main')

@section('title', 'Form Lapor Kejadian Banjir')

@section('content')
    {{-- package laravel geolocation --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />

    <section id="lapor" class="lapor">
        <div class="container" data-aos="fade-up">
            <header class="header-section">
                <p>Form Lapor Kejadian Bencana Banjir</p>
            </header>
            <form id="laporForm" method="POST">
                @csrf
                {{-- Halaman 1 : Detail Lokasi --}}
                <div id="page-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Data Lokasi Kejadian</h5>
                        <h5>1/2</h5>
                    </div>
                    <p>Harap isi data di bawah ini dengan benar dan kirim laporan Anda langsung ke lembaga pemerintah
                        berwenang.</p>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_users" class="form-label">Nama Pelapor</label>
                                <input type="text" class="form-control" id="id_users" name="id_users" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="id_kecamatan" name="id_kecamatan" required>
                            </div>
                            <div class="mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat_kejadian" class="form-label">Alamat Kejadian</label>
                                <input type="text" class="form-control" id="alamat_kejadian" name="alamat_kejadian" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_desa" class="form-label">Desa</label>
                                <input type="text" class="form-control" id="id_desa" name="id_desa" required>
                            </div>
                            <div class="mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="map"></div>
                            <div class="btn-next">
                                <button type="button" class="btn btn-custom" onclick="showPage2()">
                                    Selanjutnya <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Halaman 2 : Detail Kejadian Bencana --}}
                <div id="page-2" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Detail Kejadian Bencana</h5>
                        <h5>2/2</h5>
                    </div>
                    <p>Harap isi data di bawah ini dengan benar dan kirim laporan Anda langsung ke lembaga pemerintah
                        berwenang.</p>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis-bencana">Jenis Bencana</label>
                                <select class="form-select" id="jenis-bencana" name="jenis_bencana" required>
                                    <option selected>Pilih...</option>
                                    <option value="Banjir">Banjir</option>
                                    <option value="Gempa Bumi">Gempa Bumi</option>
                                    <option value="Tsunami">Tsunami</option>
                                    <option value="Tanah Longsor">Tanah Longsor</option>
                                    <option value="Letusan Gunung Merapi">Letusan Gunung Merapi</option>
                                    <option value="Karthutla">Karthutla</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama-kejadian" class="form-label">Nama Kejadian</label>
                                <input type="text" class="form-control" id="nama-kejadian" name="nama_kejadian" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                                <input type="text" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" required>
                            </div>
                            <div class="mb-3">
                                <label for="penyebab_kejadian" class="form-label">Penyebab Kejadian</label>
                                <textarea class="form-control" id="penyebab_kejadian" name="penyebab_kejadian" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="waktu-kejadian" class="form-label">Waktu Kejadian</label>
                                <input type="text" class="form-control" id="waktu-kejadian" name="waktu_kejadian" required>
                            </div>
                            <div class="mb-3">
                                <label for="ketinggian_air" class="form-label">Ketinggian Air</label>
                                <input type="text" class="form-control" id="ketinggian_air" name="ketinggian_air" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_file" class="form-label">Foto Kejadian</label>
                                <input type="text" class="form-control" id="nama_file" name="nama_file" required>
                            </div>
                            <div class="mb-3">
                                <label for="kronologi" class="form-label">Kronologi Kejadian</label>
                                <textarea class="form-control" id="kronologi" name="kronologi" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="btn-prev">
                                <button type="button" class="btn btn-custom" onclick="showPage1()"><i
                                        class="fas fa-arrow-left"></i> Kembali
                                </button>
                            </div>
                            <div class="btn-kirim">
                                <button type="submit" class="btn btn-custom">
                                    Kirim Laporan <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- package leaflet --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>

    {{-- menampilkan peta --}}
    <script src="{{ asset('assets-user/js/t_kejadian.js') }}"></script>

    {{-- Script jQuery untuk Mengirim Data Form --}}
    <script>
        // $(document).ready(function () {
        //     showPage1();

        //     $('#laporForm').submit(function (e) {
        //         e.preventDefault(); // Mencegah pengiriman form secara default

        //         var formData = new FormData(this);
        //         console.log(formData); // Log form data sebelum dikirim

        //         $.ajax({
        //             url: 'http://127.0.0.1:8000/api/kejadian', // Sesuaikan dengan endpoint API Anda
        //             type: 'POST',
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             headers: {
        //                 "Accept": "application/json",
        //             },
        //             success: function (response) {
        //                 console.log(response); // Log respons API
        //                 alert('Laporan berhasil dikirim');
        //                 // Redirect atau refresh halaman
        //                 window.location.href = '/lapor';
        //             },
        //             error: function (xhr, status, error) {
        //                 console.log(xhr.responseText); // Log error detail
        //                 alert('Terjadi kesalahan: ' + xhr.responseText);
        //             }
        //         });
        //     });
        // });

        function showPage1() {
            document.getElementById('page-1').style.display = 'block';
            document.getElementById('page-2').style.display = 'none';
        }

        function showPage2() {
            document.getElementById('page-1').style.display = 'none';
            document.getElementById('page-2').style.display = 'block';
        }
    </script>
@endsection
