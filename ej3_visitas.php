<?php
// contador global en archivo
$file = 'visitas.txt';
if (!file_exists($file)) file_put_contents($file, '0');
$count = (int)file_get_contents($file);
$count++;
file_put_contents($file, (string)$count);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 3: Contador</title></head>
<body>
  <p>Esta página ha sido visitada <strong><?= $count ?></strong> veces.</p>
</body>
</html>
