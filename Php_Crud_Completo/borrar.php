<?php


    include("conexion.php");


    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM tareas WHERE id = $id";
        $result = mysqli_query($conexion, $query);

            if(!$result)
            {
                die("Error al Borrar");
            }


        // Mensaje de Confirmacion de Guardado y su Estilo

        $_SESSION['message'] = 'Tarea Eliminada';
        $_SESSION['message_type'] = 'danger';


        // Reddireccionamos al Index.php

        header("Location: index.php");


    }



?>