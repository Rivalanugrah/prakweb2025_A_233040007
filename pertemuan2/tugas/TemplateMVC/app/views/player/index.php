<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($data['title']) ? $data['title'] : 'Daftar Pemain'; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
  <style>
    /* biar tombol lebih sejajar dan rapi */
    .action-bar {
      display: flex;
      gap: 8px;
      align-items: center;
      margin-bottom: 1rem;
    }
    .btn-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 90px;
      height: 42px;
      font-size: 20px;
      padding: 0;
    }
    .btn-primary {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 200px;
      height: 42px;
      font-size: 20px;
      padding: 0;
    }
  </style>
</head>
<body>
<div class="container mt-4">
  <h1 class="mb-3"><?= isset($data['title']) ? $data['title'] : 'Daftar Pemain Real Madrid CF'; ?></h1>

  
  <div class="action-bar">
    <a href="<?= BASEURL; ?>" class="btn btn-secondary btn-icon" title="Home">Home</a>
    <a href="<?= BASEURL; ?>/player/tambah" class="btn btn-primary">Tambah Pemain</a>
  </div>

  <table class="table table-striped table-bordered align-middle text-center">
    <thead class="table-dark">
      <tr>
        <th style="width:70px;">No</th>
        <th>Nama</th>
        <th>Posisi</th>
        <th>Nomor</th>
        <th style="width:150px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php if (!empty($data['players']) && is_array($data['players'])): ?>
      <?php $i = 1; foreach ($data['players'] as $player): ?>
        <?php
          $id = $player['id'] ?? null;
          $nama = $player['nama'] ?? $player['name'] ?? '-';
          $posisi = $player['posisi'] ?? $player['position'] ?? '-';
          $nomor = $player['nomor_punggung'] ?? $player['number'] ?? '-';
        ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= htmlspecialchars($nama); ?></td>
          <td><?= htmlspecialchars($posisi); ?></td>
          <td><?= htmlspecialchars($nomor); ?></td>
          <td>
            <a href="<?= BASEURL; ?>/player/detail/<?= $id; ?>" class="badge bg-primary">Detail</a>
            <a href="<?= BASEURL; ?>/player/edit/<?= $id; ?>" class="badge bg-success">Edit</a>
            <a href="<?= BASEURL; ?>/player/hapus/<?= $id; ?>" class="badge bg-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="5" class="text-center">Belum ada data pemain</td></tr>
    <?php endif; ?>
    </tbody>
  </table>
</div>

<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>
