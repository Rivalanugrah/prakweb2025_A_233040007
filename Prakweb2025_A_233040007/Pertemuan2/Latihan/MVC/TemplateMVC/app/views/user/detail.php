<div class="container mt-4">
    <h1><?= $data['judul']; ?></h1>
    <ul class="list-group mt-3">
        <li class="list-group-item"><strong>ID:</strong> <?= $data['user']['id']; ?></li>
        <li class="list-group-item"><strong>Nama:</strong> <?= $data['user']['name']; ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?= $data['user']['email']; ?></li>
    </ul>
    <a href="<?= BASEURL; ?>/user" class="btn btn-secondary mt-3">Kembali</a>
</div>
