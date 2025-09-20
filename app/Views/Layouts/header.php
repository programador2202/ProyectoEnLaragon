<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <!-- Sección 1: Cabecera -->
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Biblioteca</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('buscador'); ?>">Primer Buscador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('buscador2'); ?>">Segundo Buscador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('recursos'); ?>">Tercer Buscador </a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>
<!-- Fin sección 1 -->

<!-- Sección 2 -->
<main>