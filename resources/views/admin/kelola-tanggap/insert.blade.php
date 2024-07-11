@extends('admin.layouts-admin.main')

@section('title', 'Form Tambah Data Tanggap Bencana')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Form Tambah Data Tanggap Bencana</h3>
        </div>
        <div class="card-body">
            <form id="tanggapForm" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <div class="form-group">
                            <label for="id_kejadian">Id Kejadian</label>
                            <input type="text" class="form-control" id="id_kejadian" name="id_kejadian" required>
                        </div> --}}
                        <div class="form-group">
                            <label for="hilang">Hilang</label>
                            <input type="number" class="form-control" id="hilang" name="hilang">
                        </div>
                        <div class="form-group">
                            <label for="meninggal">Meninggal</label>
                            <input type="number" class="form-control" id="meninggal" name="meninggal">
                        </div>
                        <div class="form-group">
                            <label for="terluka">Terluka</label>
                            <input type="number" class="form-control" id="terluka" name="terluka">
                        </div>
                        <div class="form-group">
                            <label for="unsur_terlibat">Unsur yang Terlibat</label>
                            <input type="text" class="form-control" id="unsur_terlibat" name="unsur_terlibat" required>
                        </div>
                        <div id="penanganan-container">
                            <div class="form-group">
                                <label for="penanganan[]">Penanganan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="penanganan[]" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary add-field" type="button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dampak">Dampak</label>
                            <textarea class="form-control" id="dampak" name="dampak" rows="3" required></textarea>
                        </div>
                        <div class="btn-simpan">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script>
    $(document).ready(function() {
        let penangananCount = 1;

        $('.add-field').click(function() {
            penangananCount++;
            let newField = `
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="penanganan[]" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger remove-field" type="button">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#penanganan-container').append(newField);
        });

        // Menghapus field yang sudah ditambahkan
        $('#penanganan-container').on('click', '.remove-field', function() {
            $(this).closest('.form-group').remove();
        });

        // $('#tanggapForm').submit(function(e) {
        //     e.preventDefault();
            
        //     let formData = $(this).serialize();

        //     $.ajax({
        //         url: 'http://127.0.0.1:8000/api/penanganan', // API endpoint
        //         type: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             console.log(response); // Log respons API
        //             alert('Data berhasil disimpan');
        //             // Redirect atau refresh halaman
        //             window.location.href = '/tanggap';
        //         },
        //         error: function(xhr, status, error) {
        //             console.log(xhr.responseText); // Log error detail
        //             alert('Terjadi kesalahan: ' + xhr.responseText);
        //         }
        //     });
        // });
    });
</script>
@endsection
