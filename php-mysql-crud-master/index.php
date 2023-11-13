<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre del empleado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Apellido del empleado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="clave" class="form-control" placeholder="Clave del empleado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sueldo" class="form-control" placeholder="Sueldo del empleado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="idventa" class="form-control" placeholder="IdVenta del empleado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="puesto" class="form-control" placeholder="Puesto del empleado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="edad" class="form-control" placeholder="Edad del empleado" autofocus>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Clave</th>
            <th>Sueldo</th>
            <th>Idventa</th>
            <th>Puesto</th>
            <th>Edad</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM empleados";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['clave']; ?></td>
            <td><?php echo $row['sueldo']; ?></td>
            <td><?php echo $row['idventa']; ?></td>
            <td><?php echo $row['puesto']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td>
              <a href="edit.php?idempleado=<?php echo $row['idempleado']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?idempleado=<?php echo $row['idempleado']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
