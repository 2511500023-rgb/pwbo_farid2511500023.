<?php 

class Controller {
    public function hapus($id)
{
    if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
        Flasher::setFlash('berhasil', 'dihapus', 'success');
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    } else {
        Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
}
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
}