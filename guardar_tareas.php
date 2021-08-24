<?php

include("db.php");

if (isset($_POST['save_task'])){
    $titulo = $_POST['Titulo'];
    $descripcion = $_POST['Descripcion'];
    
    $squery = "INSERT INTO tarea(Titulo, Descripcion) VALUES ('$titulo', '$descripcion')";
    $resultado = mysqli_query($conn, $squery);
    if (!$resultado){
        die("Consulta Fallida");
    }

    $_SESSION['message'] = 'Tarea Guardada Satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>