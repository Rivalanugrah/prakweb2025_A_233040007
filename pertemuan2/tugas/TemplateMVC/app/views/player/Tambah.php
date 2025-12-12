<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($data['title']) ? $data['title'] : 'Tambah Pemain'; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-3"><?= isset($data['title']) ? $data['title'] : 'Tambah Pemain'; ?></h1>

    <form action="<?= BASEURL; ?>/player/simpan" method="post">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Posisi</label>
            <input type="text" name="position" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Punggung</label>
            <input type="number" name="number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
             <input type="number" class="form-control" id="umur" name="umur" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Negara</label>
            <input type="text" name="nationality" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/player" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>
