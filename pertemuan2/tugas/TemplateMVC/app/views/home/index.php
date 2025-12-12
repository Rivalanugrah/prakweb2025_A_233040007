<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real Madrid CF</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1d2d50;">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning" href="<?= BASEURL; ?>">Real Madrid CF</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= BASEURL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL; ?>/player">Daftar Pemain</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center mt-5">
    <div class="card shadow-lg border-0 p-5 mx-auto" style="max-width: 700px;">
        <h1 class="display-5 fw-bold text-primary mb-4">
            Selamat datang di <br> Real Madrid CF
        </h1>

        <div class="d-flex justify-content-center">
        <img src="https://upload.wikimedia.org/wikipedia/en/5/56/Real_Madrid_CF.svg" 
           alt="Logo Real Madrid" 
           class="my-3"
           style="width:230px; height:auto;">
           </div>

        <p class="lead text-muted mb-4">
            Sistem CRUD sederhana berbasis PHP MVC.<br>
            Menampilkan data pemain Real Madrid.
        </p>
        <a href="<?= BASEURL; ?>/player" class="btn btn-primary btn-lg px-4">
            Lihat Daftar Pemain
        </a>
    </div>
</div>

<footer class="text-center mt-5 mb-3 text-muted">
    &copy; <?= date('Y'); ?> Real Madrid CF - Dibuat oleh Asep Saepul Milah
</footer>

<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>
