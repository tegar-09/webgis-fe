@extends('admin.layouts-admin.main')

@section('title', 'Form Edit Data Kejadian Banjir')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3>Form Edit Data Kejadian Banjir</h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama-pelapor" class="form-label">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama-pelapor">
                                </div>
                                <div class="form-group">
                                    <label for="nama-kejadian" class="form-label">Nama Kejadian</label>
                                    <input type="text" class="form-control" id="nama-kejadian">
                                </div>
                                <div class="form-group">
                                    <label for="waktu-kejadian" class="form-label">Waktu Kejadian</label>
                                    <input type="text" class="form-control" id="waktu-kejadian">
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan">
                                </div>
                                <div class="form-group">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="latitude">
                                </div>
                                <div class="form-group">
                                    <label for="ketinggian-air" class="form-label">Ketinggian Air</label>
                                    <input type="text" class="form-control" id="ketinggian-air">
                                </div>
                                <div class="form-group">
                                    <label for="penyebab" class="form-label">Penyebab Kejadian</label>
                                    <textarea class="form-control" id="penyebab" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="penanganan" class="form-label">Penanganan</label>
                                    <textarea class="form-control" id="penanganan" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="unsur-terlibat" class="form-label">Unsur yang Terlibat</label>
                                    <input type="text" class="form-control" id="unsur-terlibat">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis-bencana" class="form-label">Jenis Bencana</label>
                                    <select class="form-select" id="jenis-bencana">
                                        <option selected>Pilih...</option>
                                        <option value="1">Banjir</option>
                                        <option value="2">Gempa Bumi</option>
                                        <option value="3">Tsunami</option>
                                        <option value="4">Tanah Longsor</option>
                                        <option value="5">Letusan Gunung Merapi</option>
                                        <option value="6">Karthutla</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl-kejadian" class="form-label">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" id="tgl-kejadian">
                                </div>
                                <div class="form-group">
                                    <label for="alamat-kejadian" class="form-label">Alamat Kejadian</label>
                                    <input type="text" class="form-control" id="alamat-kejadian">
                                </div>
                                <div class="form-group">
                                    <label for="desa" class="form-label">Desa</label>
                                    <input type="text" class="form-control" id="desa">
                                </div>
                                <div class="form-group">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="longitude">
                                </div>
                                <div class="form-group">
                                    <label for="korban" class="form-label">Korban</label>
                                    <input type="text" class="form-control" id="korban">
                                </div>
                                <div class="form-group">
                                    <label for="kronologi" class="form-label">Kronologi Kejadian</label>
                                    <textarea class="form-control" id="kronologi" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dampak" class="form-label">Dampak</label>
                                    <textarea class="form-control" id="dampak" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto-kejadian" class="form-label">Foto Kejadian</label>
                                    <input type="file" class="form-control" id="foto-kejadian">
                                </div>
                            </div>
                            <div class="btn-simpan">
                                <a href="#" class="btn btn-primary btn-sm">Simpan</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
