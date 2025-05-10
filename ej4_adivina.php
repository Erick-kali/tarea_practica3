<?php
session_start();
if (!isset($_SESSION['secreto'])) {
  $_SESSION['secreto'] = rand(1, 100);
}
if (isset($_GET['g'])) {
  $g = (int)$_GET['g'];
  $s = $_SESSION['secreto'];
  if ($g === $s) { $msg = "¡Correcto! Era $s."; session_unset(); }
  elseif ($g < $s) { $msg = 'Muy bajo'; }
  else { $msg = 'Muy alto'; }
  header('Content-Type: application/json');
  echo json_encode(['msg'=>$msg]);
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 4: Adivinanzas</title></head>
<body>
  <input id="num" type="number" min="1" max="100" placeholder="1–100">
  <button id="btn">Adivinar</button>
  <p id="res"></p>
  <script>
    document.getElementById('btn').addEventListener('click', () => {
      let v = document.getElementById('num').value;
      fetch('?g='+v).then(r=>r.json()).then(j=> document.getElementById('res').textContent = j.msg);
    });
  </script>
</body>
</html>
