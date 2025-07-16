<?php
  $conn = mysqli_connect('localhost', 'root', '', 'chocolate_bd');

  if (!$conn) {
    die('Error en la conexión: ' . mysqli_connect_error());
  }
?>
