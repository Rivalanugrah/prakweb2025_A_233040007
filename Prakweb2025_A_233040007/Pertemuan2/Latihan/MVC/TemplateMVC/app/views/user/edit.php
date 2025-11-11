<div class="container mt-5">
    <h3>Edit Data User</h3>
    <form action="<?= BASEURL; ?>/user/edit" method="POST">
        <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="<?= $data['user']['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="<?= $data['user']['email']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Batal</a>
    </form>
</div>
