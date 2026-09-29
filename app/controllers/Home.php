<?php

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser(); // <-- Tambahkan baris ini
        $this->view('templates/header', $data);
        $this->view('home/index', $data);                      // <-- Pastikan ada $data di sini
        $this->view('templates/footer');
    }
}