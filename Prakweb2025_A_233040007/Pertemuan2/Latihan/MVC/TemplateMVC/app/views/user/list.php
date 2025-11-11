<div class="container mt-5">
    <div class="bg-white p-4 shadow-sm rounded-4">
        <h1 class="mb-4 text-primary"><?= $data['judul']; ?></h1>

        <?php Flasher::flash(); ?> <!-- Menampilkan pesan flash -->

        <a href="<?= BASEURL; ?>/user/tambah" class="btn btn-primary mb-3 shadow-sm rounded-3">+ Tambah User</a>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['users'])): ?>
                        <?php foreach ($data['users'] as $user): ?>
                        <tr>
                            <td class="text-center"><?= $user['id']; ?></td>
                            <td><?= htmlspecialchars($user['name']); ?></td>
                            <td><?= htmlspecialchars($user['email']); ?></td>
                            <td class="text-center">
                                <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="btn btn-info btn-sm rounded-3">Detail</a>
                                <a href="<?= BASEURL; ?>/user/edit/<?= $user['id']; ?>" class="btn btn-warning btn-sm rounded-3">Edit</a>
                                <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="btn btn-danger btn-sm rounded-3" onclick="return confirm('Yakin hapus user ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">Belum ada data user.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
