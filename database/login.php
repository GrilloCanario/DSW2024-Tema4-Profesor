<?php

if(isset($_GET['username']) && isset($_GET['password'])) { // isset = si existe el parametro
  $username = $_GET['username'];
  $password = $_GET['password'];

  echo "us: $username, pass: $password";

  require 'connection.php'; 

  $stmt = $link->stmt_init();
  $stmt->prepare("SELECT * FROM `user` WHERE username=? AND password =?");
  $stmt->bind_param("ss", $username, $password); //ss para 2 strings
  
  $stmt->execute();

  if ($stmt->num_rows() > 0) {
    echo "<h1>Bienvenido</h1>";
  } else {
    echo "<h2>Error en el usuario y/o contraseña</h2>";
  }
  $stmt->close();
  $link->close();

  // $sql = "SELECT * FROM `user` WHERE username='$username' AND password ='$password'";
  // echo $sql;
  // $results = $link->query($sql);
  // if ($results->num_rows > 0) { // hemos encontrado a 1 usuario con eso parametros
  //   echo "<h1>Bienvenido</h1>";
  // } else {
  //   echo "<h2>Error en el usuario y/o contraseña</h2>";
  // }
  // $link->close();
} else {
  echo "No existen los parametros";
}