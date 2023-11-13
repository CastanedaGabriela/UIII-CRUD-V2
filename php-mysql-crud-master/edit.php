<?php
include("db.php");
$nombre = '';
$apellido= '';
$clave= '';
$sueldo= '';
$idventa= '';
$puesto= '';
$edad= '';

if  (isset($_GET['idempleado'])) {
  $idempleado = $_GET['idempleado'];
  $query = "SELECT * FROM empleados WHERE idempleado=$idempleado";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $clave = $row['clave'];
    $sueldo = $row['sueldo'];
    $idventa = $row['idventa'];
    $puesto = $row['puesto'];
    $edad = $row['edad'];
  }
}

if (isset($_POST['update'])) {
  $idempleado = $_GET['idempleado'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $clave = $_POST['clave'];
  $sueldo = $_POST['sueldo'];
  $idventa = $_POST['idventa'];
  $puesto = $_POST['puesto'];
  $edad = $_POST['edad'];


  $query = "UPDATE empleados set nombre = '$nombre', apellido = '$apellido', clave = '$clave', sueldo = '$sueldo', idventa = '$idventa', puesto = '$puesto', edad = '$edad' WHERE idempleado=$idempleado";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?idempleado=<?php echo $_GET['idempleado']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar nombre">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Actualizar apellido">
        </div>
        <div class="form-group">
          <input name="clave" type="text" class="form-control" value="<?php echo $clave; ?>" placeholder="Actualizar clave">
        </div>
        <div class="form-group">
          <input name="sueldo" type="text" class="form-control" value="<?php echo $sueldo; ?>" placeholder="Actualizar sueldo">
        </div>
        <div class="form-group">
          <input name="idventa" type="text" class="form-control" value="<?php echo $idventa; ?>" placeholder="Actualizar idventa">
        </div>
        <div class="form-group">
          <input name="puesto" type="text" class="form-control" value="<?php echo $puesto; ?>" placeholder="Actualizar puesto">
        </div>
        <div class="form-group">
          <input name="edad" type="text" class="form-control" value="<?php echo $edad; ?>" placeholder="Actualizar edad">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
