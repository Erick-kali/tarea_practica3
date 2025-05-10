<?php
// Lista de URLs globales (Picsum) — sin usar carpetas locales
$imgs = [
  'https://picsum.photos/seed/1/300/200',
  'https://picsum.photos/seed/2/300/200',
  'https://picsum.photos/seed/3/300/200',
  'https://picsum.photos/seed/4/300/200',
  'https://picsum.photos/seed/5/300/200',
  'https://picsum.photos/seed/6/300/200',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejercicio 5: Galería (URLs globales)</title>
  <style>
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(150px,1fr));
      gap: 10px;
    }
    .gallery img {
      width: 100%;
      height: auto;
      display: block;
    }
  </style>
</head>
<body>
  <h2>Galería de Imágenes (URLs Globales)</h2>
  <div class="gallery">
    <?php foreach($imgs as $url): ?>
      <img src="<?= htmlspecialchars($url) ?>" alt="Imagen aleatoria">
    <?php endforeach; ?>
  </div>
</body>
</html>
