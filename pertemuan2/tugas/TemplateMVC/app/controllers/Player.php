<?php

class Player extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Pemain Real Madrid CF';
        $data['players'] = $this->model('Player_model')->getAllPlayers();
        $this->view('player/index', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pemain Real Madrid CF';
        $data['player'] = $this->model('Player_model')->getPlayerById($id);
        $this->view('player/detail', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pemain Real Madrid CF';
        $this->view('player/tambah', $data);
    }

    public function simpan()
    {
        // Validasi sederhana sebelum simpan
        if (empty($_POST['name']) || empty($_POST['position']) || !isset($_POST['number']) || empty($_POST['nationality'])) {
            header('Location: ' . BASEURL . '/player/tambah');
            exit;
        }

        $res = $this->model('Player_model')->tambahDataPlayer($_POST);

        if ($res > 0) {
            header('Location: ' . BASEURL . '/player');
            exit;
        } else {
            echo "❌ Gagal menambahkan pemain Real Madrid.";
        }
    }

    public function hapus($id)
    {
        if ($this->model('Player_model')->hapusDataPlayer($id) > 0) {
            header('Location: ' . BASEURL . '/player');
            exit;
        } else {
            echo "❌ Gagal menghapus pemain Real Madrid.";
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Pemain Real Madrid CF';
        $data['player'] = $this->model('Player_model')->getPlayerById($id);
        $this->view('player/ubah', $data);
    }

    public function update()
    {
        if ($this->model('Player_model')->ubahDataPlayer($_POST) > 0) {
            header('Location: ' . BASEURL . '/player');
            exit;
        } else {
            echo "❌ Gagal mengubah data pemain Real Madrid.";
        }
    }
}
