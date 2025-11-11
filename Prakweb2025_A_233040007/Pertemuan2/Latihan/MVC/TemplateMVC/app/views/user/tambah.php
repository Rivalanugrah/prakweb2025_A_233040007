<div class="container mt-4">
    <h1><?= $data['judul'] ?? 'Tambah User'; ?></h1>
    <form action="<?= BASEURL; ?>/user/tambah" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Kembali</a>
    </form>
</div>
