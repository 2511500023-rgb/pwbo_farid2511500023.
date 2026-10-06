$(function () {

    // =========================
    // TOMBOL TAMBAH
    // =========================
    $(document).on('click', '.tombolTambahData', function () {

        $('#judulModal').html('Tambah Data Mahasiswa');

        $('#formModal .modal-footer button[type=submit]').html('Tambah Data');

        $('#formModal form').attr(
            'action',
            'http://localhost/pwbo_farid2511500023/public/mahasiswa/tambah'
        );

        $('#id').val('');
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('Teknik Informatika');

    });


    // =========================
    // TOMBOL UBAH
    // =========================
    $(document).on('click', '.tampilModalUbah', function () {

        var id = $(this).data('id');

        $('#judulModal').html('Ubah Data Mahasiswa');

        $('#formModal .modal-footer button[type=submit]').html('Ubah Data');

        $('#formModal form').attr(
            'action',
            'http://localhost/pwbo_farid2511500023/public/mahasiswa/ubah'
        );

        // Tampilkan modal
        $('#formModal').modal('show');

        // Ambil data mahasiswa
        $.ajax({

            url: 'http://localhost/pwbo_farid2511500023/public/mahasiswa/getubah',

            type: 'POST',

            data: {
                id: id
            },

            dataType: 'json',

            success: function (data) {

                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);

            },

            error: function (xhr) {

                console.log(xhr.responseText);

                alert('Data mahasiswa gagal diambil.');

            }

        });

    });

});