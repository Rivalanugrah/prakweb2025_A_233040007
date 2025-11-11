<?php

class User extends Controller
{
    // TAMPILKAN SEMUA USER
    public function index()
    {
        $data['judul'] = "Data User";
        $data['users'] = $this->model('User_model')->getAllUsers();
        $this->view('templates/header', $data);
        $this->view('user/list', $data);
        $this->view('templates/footer');
    }

    // DETAIL USER
    public function detail($id)
    {
        $data['judul'] = "Detail User";
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('user/detail', $data);
        $this->view('templates/footer');
    }

    // FORM TAMBAH USER
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/user');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/user');
                exit;
            }
        } else {
            $data['judul'] = 'Tambah User';
            $this->view('templates/header', $data);
            $this->view('user/tambah', $data);
            $this->view('templates/footer');
        }
    }

    // FORM EDIT USER
    public function edit($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model('User_model')->updateDataUser($_POST) > 0) {
                Flasher::setFlash('berhasil', 'diedit', 'success');
                header('Location: ' . BASEURL . '/user');
                exit;
            } else {
                Flasher::setFlash('gagal', 'diedit', 'danger');
                header('Location: ' . BASEURL . '/user');
                exit;
            }
        } else {
            $data['judul'] = 'Edit User';
            $data['user'] = $this->model('User_model')->getUserById($id);
            $this->view('templates/header', $data);
            $this->view('user/edit', $data);
            $this->view('templates/footer');
        }
    }

    // HAPUS USER
    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}
