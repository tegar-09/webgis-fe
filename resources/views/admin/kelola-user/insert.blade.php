@extends('admin.layouts-admin.main')

@section('title', 'Form Tambah Data User')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3>Form Tambah Data User</h3>
            </div>
            <div class="card-body">
                <form action="" id="tambah-user">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama-asli">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama-asli" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" required>
                            </div>
                            <div class="form-group">
                                <label for="lembaga">Lembaga</label>
                                <input type="text" class="form-control" id="lembaga" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="no-telp">No Telepon</label>
                                <input type="text" class="form-control" id="no-telp" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Jenis User</label>
                                <select class="form-select" id="role">
                                    <option selected>Pilih...</option>
                                    <option value="1">TRC</option>
                                    <option value="2">Relawan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="btn-simpan">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
    $('#tambah-user').submit(function(e) {
        e.preventDefault();

        var formUser = new FormData();
        form.append("username", $('#username').val());
        form.append("password", $('#password').val());
        form.append("nik", $('#nik').val());
        form.append("nama_asli", $('#nama_asli').val());
        form.append("alamat", $('#alamat').val());
        form.append("lembaga", $('#lembaga').val());
        form.append("no_telp", $('#no_telp').val());
        form.append("role", $('#role').val());

        // Log data to console for debugging
        console.log("Form Data:");
        form.forEach((value, key) => {
            console.log(key + ": " + value);
        });
        var settings = {
            "url": "http://127.0.0.1:8000/api/users",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer YOUR_TOKEN_HERE", // Replace with your actual token
                "Cookie": "XSRF-TOKEN=YOUR_XSRF_TOKEN_HERE; laravel_session=YOUR_SESSION_HERE"
            },
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": formUser
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
            alert('User registered successfully');
        }).fail(function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Error: ' + xhr.responseText);
        });
    });
});

    </script>
@endsection
