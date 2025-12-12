<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= htmlspecialchars($data['title'] ?? 'Detail Pemain'); ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>
<body class="p-4">
  <div class="container">
    <h1 class="mb-4"><?= htmlspecialchars($data['title'] ?? 'Detail Pemain'); ?></h1>

    <?php
      $player = $data['player'] ?? null;
      $nama = $player['name'] ?? $player['nama'] ?? '-';
      $posisi = $player['position'] ?? $player['posisi'] ?? '-';
      $nomor = $player['number'] ?? $player['nomor_punggung'] ?? '-';
      $umur = $player['age'] ?? $player['umur'] ?? '-';
      $negara = $player['nationality'] ?? $player['negara'] ?? '-';
    ?>

    <?php if ($player): ?>
      <ul class="list-group">
        <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($nama); ?></li>
        <li class="list-group-item"><strong>Posisi:</strong> <?= htmlspecialchars($posisi); ?></li>
        <li class="list-group-item"><strong>Nomor:</strong> <?= htmlspecialchars($nomor); ?></li>
        <li class="list-group-item"><strong>Umur:</strong> <?= htmlspecialchars($umur); ?></li>
        <li class="list-group-item"><strong>Negara:</strong> <?= htmlspecialchars($negara); ?></li>
      </ul>
    <?php else: ?>
      <div class="alert alert-warning">Data pemain tidak ditemukan.</div>
    <?php endif; ?>

    <a href="<?= BASEURL; ?>/player" class="btn btn-secondary mt-3">Kembali</a>
  </div>

  <script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>
