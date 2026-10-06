<?php 

class Mahasiswa extends Controller {

    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }


    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }


    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Jika ada ID, berarti UBAH
            if (!empty($_POST['id'])) {

                $hasil = $this->model('Mahasiswa_model')
                             ->ubahDataMahasiswa($_POST);

                if ($hasil > 0) {
                    Flasher::setFlash(
                        'berhasil',
                        'diubah',
                        'success'
                    );
                } else {
                    Flasher::setFlash(
                        'gagal',
                        'diubah',
                        'danger'
                    );
                }

            } else {

                // Jika tidak ada ID, berarti TAMBAH
                $hasil = $this->model('Mahasiswa_model')
                             ->tambahDataMahasiswa($_POST);

                if ($hasil > 0) {
                    Flasher::setFlash(
                        'berhasil',
                        'ditambahkan',
                        'success'
                    );
                } else {
                    Flasher::setFlash(
                        'gagal',
                        'ditambahkan',
                        'danger'
                    );
                }
            }

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;

        } else {

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;

        }
    }


    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {

            Flasher::setFlash(
                'berhasil',
                'dihapus',
                'success'
            );

        } else {

            Flasher::setFlash(
                'gagal',
                'dihapus',
                'danger'
            );
        }

        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }


    public function getubah()
    {
        echo json_encode(
            $this->model('Mahasiswa_model')
                 ->getMahasiswaById($_POST['id'])
        );
    }


    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (
                isset($_POST['id']) &&
                isset($_POST['nama']) &&
                isset($_POST['nim']) &&
                isset($_POST['email']) &&
                isset($_POST['jurusan'])
            ) {

                $hasil = $this->model('Mahasiswa_model')
                             ->ubahDataMahasiswa($_POST);

                if ($hasil > 0) {

                    Flasher::setFlash(
                        'berhasil',
                        'diubah',
                        'success'
                    );

                } else {

                    Flasher::setFlash(
                        'gagal',
                        'diubah',
                        'danger'
                    );
                }

            } else {

                Flasher::setFlash(
                    'gagal',
                    'diubah',
                    'danger'
                );
            }

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

}