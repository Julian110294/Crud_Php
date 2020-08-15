<?php


    include("conexion.php");


    if(isset($_POST['guardar_tarea']))
    {
        $tarea = $_POST['tarea'];
        $responsable = $_POST['responsable'];
        $descripcion = $_POST['descripcion'];


        $query = "INSERT INTO tareas(tarea, responsable, descripcion) VALUES ('$tarea', '$responsable', '$descripcion') ";

        $resultado = mysqli_query($conexion, $query);


        // Comprobamos Si Devuelve un Resultado

        if(!$resultado)
        {
            die("Error al Guardar");
        }


        // Mensaje de Confirmacion de Guardado y su Estilo

        $_SESSION['message'] = 'Tarea Guardada';
        $_SESSION['message_type'] = 'success';


        // Reddireccionamos al Index.php

        header("Location: index.php");


    }



?>