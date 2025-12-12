<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data['title'] ?? 'Ubah Pemain'); ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-3"><?= htmlspecialchars($data['title'] ?? 'Ubah Pemain'); ?></h1>

    <?php if (!empty($data['player'])): ?>
    <form action="<?= BASEURL; ?>/player/update" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['player']['id']); ?>">

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control"
                   value="<?= htmlspecialchars($data['player']['name'] ?? $data['player']['nama'] ?? ''); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Posisi</label>
            <input type="text" name="position" class="form-control"
                   value="<?= htmlspecialchars($data['player']['position'] ?? $data['player']['posisi'] ?? ''); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Punggung</label>
            <input type="number" name="number" class="form-control"
                   value="<?= htmlspecialchars($data['player']['number'] ?? $data['player']['nomor_punggung'] ?? ''); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Negara</label>
            <input type="text" name="nationality" class="form-control"
                   value="<?= htmlspecialchars($data['player']['nationality'] ?? $data['player']['negara'] ?? ''); ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?= BASEURL; ?>/player" class="btn btn-secondary">Batal</a>
    </form>
    <?php else: ?>
      <div class="alert alert-warning">Data pemain tidak ditemukan.</div>
      <a href="<?= BASEURL; ?>/player" class="btn btn-secondary mt-2">Kembali</a>
    <?php endif; ?>
</div>

<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>


