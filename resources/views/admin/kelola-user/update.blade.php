@extends('admin.layouts-admin.main')

@section('title', 'Form Edit Data User')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3>Form Edit Data User</h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama-asli">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama-asli" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="lembaga">Lembaga</label>
                                <input type="text" class="form-control" id="lembaga" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="no-telp">No Telepon</label>
                                <input type="text" class="form-control" id="no-telp" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="jenis_user">Jenis User</label>
                                <select class="form-select" id="jenis_user">
                                    <option selected>Pilih...</option>
                                    <option value="1">Admin</option>
                                    <option value="2">TRC</option>
                                    <option value="3">Relawan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
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
