<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $clave = $_POST['clave'];
  $sueldo = $_POST['sueldo'];
  $idventa = $_POST['idventa'];
  $puesto = $_POST['puesto'];
  $edad = $_POST['edad'];
  $query = "INSERT INTO empleados(nombre, apellido, clave, sueldo, idventa, puesto, edad) VALUES ('$nombre', '$apellido', '$clave', '$sueldo', '$idventa', '$puesto', '$edad')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
