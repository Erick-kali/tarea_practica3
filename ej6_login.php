<?php
session_start();

// Lista de usuarios con contraseña en texto plano
$users = [
  [
    'email' => 'admin@site',
    'pass'  => '1234',
    'role'  => 'admin'
  ],
  [
    'email' => 'user@site',
    'pass'  => 'abcd',
    'role'  => 'user'
  ]
];

// Cerrar sesión si viene el parámetro logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: ej6_login.php');
    exit;
}

$error = '';
// Procesar login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $found    = false;
    foreach ($users as $u) {
        if ($u['email'] === $email && $u['pass'] === $password) {
            // Credenciales correctas
            $_SESSION['user'] = [
                'email' => $u['email'],
                'role'  => $u['role']
            ];
            $found = true;
            header('Location: ej6_login.php');
            exit;
        }
    }
    if (! $found) {
        $error = 'Credenciales inválidas';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejercicio 6: Login (Texto Plano)</title>
</head>
<body>
  <h2>Sistema de Login</h2>

  <?php if ($error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <?php if (!isset($_SESSION['user'])): ?>
    <form method="post" action="ej6_login.php">
      <label>
        Email:<br>
        <input type="email" name="email" required>
      </label><br><br>
      <label>
        Contraseña:<br>
        <input type="password" name="password" required>
      </label><br><br>
      <button type="submit">Entrar</button>
    </form>
  <?php else: ?>
    <p>¡Bienvenido, <?= htmlspecialchars($_SESSION['user']['email']) ?>!</p>
    <p>Rol: <?= htmlspecialchars($_SESSION['user']['role']) ?></p>
    <a href="ej6_login.php?logout=1">Cerrar sesión</a>
  <?php endif; ?>
</body>
</html>
