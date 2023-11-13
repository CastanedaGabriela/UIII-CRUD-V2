<?php

include("db.php");

if(isset($_GET['idempleado'])) {
  $idempleado = $_GET['idempleado'];
  $query = "DELETE FROM empleados WHERE idempleado = $idempleado";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
