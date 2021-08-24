<?php include ("db.php")?>

<?php include ("includes/cabecera.php")?>

<div class="container p-4">

    <div class="row">
        
    <div class="col-md-4">

    <?php if(isset($_SESSION['message'])){?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
         <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
   <?php session_unset(); } ?>

            <div class="card card-body">

                <form action="guardar_tareas.php" method="POST">
                    <div class="formgroup">
                        <input type="text" name="Titulo" class="form-control"
                        placeholder="Titulo de la Tarea" autofocus>
                    </div>
                    <div class="formgroup">
                        <textarea name="Descripcion" id="" cols="" rows="2" class="form-control"
                        placeholder="Descripcion de la tarea"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="save_task" value="Guardar Tarea">
                </form>
            </div>
    </div>
    <div class="col-md-8">
            <table class= "table table-bordered" >
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Creado En</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tarea";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['Titulo'] ?></td>
                            <td><?php echo $row['Descripcion'] ?></td>
                            <td><?php echo $row['Creado_En'] ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="borrar_tareas.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?php include ("includes/footer.php")?>
        