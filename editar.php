<?php 

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tarea WHERE Id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row ['Titulo'];
            $descripcion = $row ['Descripcion'];
        }
    }

    if(isset($_POST['update'])){
       $id = $_GET ['id'];
       $title = $_POST ['title'];
       $descripcion = $_POST ['description'];

       $query = "UPDATE tarea set Titulo = '$title', Descripcion = '$descripcion' WHERE Id = $id";
       mysqli_query($conn, $query);

       $_SESSION['message'] = 'Tarea Actualizada Correctamente';
       $_SESSION['message_type'] = 'warning';
       header("Location: index.php");
    }

?>

<?php include("includes/cabecera.php") ?>

<div class="container p-4";>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class= card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>"
                        class= "form-control" placeholder= "Actualiza el Titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder= "Actualiza la Descripcion"> <?php echo $descripcion; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>