@extends('admin.layouts-admin.main')

@section('title', 'Form Edit Data Tanggap Bencana')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3>Form Edit Data Tanggap Bencana</h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="hilang">Hilang</label>
                                <input type="text" class="form-control" id="hilang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="meninggal">Meninggal</label>
                                <input type="text" class="form-control" id="meninggal" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="terluka">Terluka</label>
                                <input type="text" class="form-control" id="terluka" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="unsur-terlibat">Unsur yang Terlibat</label>
                                <input type="text" class="form-control" id="unsur-terlibat" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="penanganan">Penanganan</label>
                                <textarea class="form-control" id="penanganan" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="dampak">Dampak</label>
                                <textarea class="form-control" id="dampak" rows="3"></textarea>
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
