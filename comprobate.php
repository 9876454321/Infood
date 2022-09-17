<?php
  session_start();
  require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>InFood | Bienvenido</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/data.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['email']; ?>
      <br>Has iniciado sesión correctamente
      <br> <a href="logout.php">Cerrar Sesión</a>
      <br> <a href="http://127.0.0.1:8000/">Ingresar al sistema</a>
      <br> <a href="index.html">Volver</a>
    <?php else: ?>
      <h1>Por favor Iniciar sesión o Registrarse</h1>
      <a href="login.php">Inciar sesión</a> o
      <a href="signup.php">Registrarse</a>
      <br> <a href="index.html">Volver</a>
    <?php endif; ?>
  </body>
</html>