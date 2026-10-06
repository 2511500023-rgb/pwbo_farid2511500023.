<div class="container mt-3">

    <div class="row">

        <?php Flasher::flash(); ?>

        <div class="col-8">

            <button type="button"
                    class="btn btn-primary"
                    onclick="tambahData()">
                Tambah Data Mahasiswa
            </button>

            <h3 class="mt-3">Daftar Mahasiswa</h3>

            <ul class="list-group">

                <?php foreach ($data['mhs'] as $mhs) : ?>

                    <li class="list-group-item d-flex justify-content-between align-items-center">

                        <?= $mhs['nama']; ?>

                        <div>

                            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>"
                               class="btn btn-primary btn-sm">
                                Detail
                            </a>

                            <button type="button"
                                    class="btn btn-success btn-sm"
                                    onclick="ubahData(<?= $mhs['id']; ?>)">
                                Ubah
                            </button>

                            <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?');">
                                Hapus
                            </a>

                        </div>

                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    </div>

</div>


<!-- MODAL -->

<div class="modal fade" id="formModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="judulModal">
                    Tambah Data Mahasiswa
                </h5>

                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    &times;
                </button>

            </div>


            <form action="<?= BASEURL; ?>/mahasiswa/tambah"
                  method="post"
                  id="formMahasiswa">

                <!-- ID MAHASISWA -->
                <input type="hidden"
                       name="id"
                       id="id"
                       value="">


                <div class="modal-body">

                    <!-- NAMA -->
                    <div class="form-group">

                        <label for="nama">
                            Nama
                        </label>

                        <input type="text"
                               class="form-control"
                               name="nama"
                               id="nama"
                               required>

                    </div>


                    <!-- NIM -->
                    <div class="form-group">

                        <label for="nim">
                            NIM
                        </label>

                        <input type="text"
                               class="form-control"
                               name="nim"
                               id="nim"
                               required>

                    </div>


                    <!-- EMAIL -->
                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input type="email"
                               class="form-control"
                               name="email"
                               id="email"
                               required>

                    </div>


                    <!-- JURUSAN -->
                    <div class="form-group">

                        <label for="jurusan">
                            Jurusan
                        </label>

                        <select class="form-control"
                                name="jurusan"
                                id="jurusan"
                                required>

                            <option value="Teknik Informatika">
                                Teknik Informatika
                            </option>

                            <option value="Sistem Informasi">
                                Sistem Informasi
                            </option>

                            <option value="Manajemen Informatika">
                                Manajemen Informatika
                            </option>

                        </select>

                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Close
                    </button>

                    <button type="submit"
                            class="btn btn-primary"
                            id="tombolSubmit">
                        Tambah Data
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

function tambahData()
{
    $('#judulModal').html('Tambah Data Mahasiswa');

    $('#tombolSubmit').html('Tambah Data');

    $('#id').val('');
    $('#nama').val('');
    $('#nim').val('');
    $('#email').val('');
    $('#jurusan').val('Teknik Informatika');

    $('#formMahasiswa').attr(
        'action',
        '<?= BASEURL; ?>/mahasiswa/tambah'
    );

    $('#formModal').modal('show');
}


function ubahData(id)
{
    $.ajax({

        url: '<?= BASEURL; ?>/mahasiswa/getubah',

        type: 'POST',

        data: {
            id: id
        },

        dataType: 'json',

        success: function(data)
        {
            $('#judulModal').html('Ubah Data Mahasiswa');

            $('#tombolSubmit').html('Ubah Data');

            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#nim').val(data.nim);
            $('#email').val(data.email);
            $('#jurusan').val(data.jurusan);

            $('#formMahasiswa').attr(
                'action',
                '<?= BASEURL; ?>/mahasiswa/tambah'
            );

            $('#formModal').modal('show');
        },

        error: function(xhr)
        {
            console.log(xhr.responseText);

            alert('Gagal mengambil data mahasiswa.');
        }

    });
}

</script>