<?php
@$link = new mysqli('localhost', 'shopuser', '123456', 'shop');
$error = $link->connect_errno;
if ($error != null) {
  echo "<p>Error $error conectando a la base de datos: $link->connect_error</p>";
  die('error nuestro');
}
