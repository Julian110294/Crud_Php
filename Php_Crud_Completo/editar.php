<?php


    include("conexion.php");


    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "SELECT * FROM tareas WHERE id = $id";
        $result = mysqli_query($conexion, $query);

            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_array($result);

                $tarea = $row['tarea'];
                $responsable = $row['responsable'];
                $descripcion = $row['descripcion'];
            }


    }



        if(isset($_POST['editar']))
        {
            $id = $_GET['id'];
            $tarea = $_POST['tarea'];
            $responsable = $_POST['responsable'];
            $descripcion = $_POST['descripcion'];

            $query = "UPDATE tareas SET tarea = '$tarea', responsable = '$responsable', descripcion = '$descripcion' WHERE id = '$id' ";
            mysqli_query($conexion, $query);



            // Mensaje de Confirmacion de Guardado y su Estilo

            $_SESSION['message'] = 'Tarea Editada';
            $_SESSION['message_type'] = 'info';




            // Reddireccionamos al Index.php

            header("Location: index.php");

        }


?>



<?php include("includes/header.php") ?>

<!-- Formulario para Editar -->

<div class="container p-4">

    <div class="row">
    
        <div class="col-md-4 mx-auto">
        
            <div class="card card-body">
            
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                
                    
                    
                    <div class="form-group">
                    
                    <input type="text" name="tarea" value=" <?php echo $tarea; ?> " class="form-control" placeholder="Actualiza la Tarea">

                    </div>




                    <div class="form-group">
                    
                    <input type="text" name="responsable" value=" <?php echo $responsable; ?> " class="form-control" placeholder="Actualiza el Responsable">

                    </div>




                    <div class="form-group">
                    
                    <textarea name="descripcion" rows="6" class="form-control" placeholder="Actualiza la Descripcion"> <?php echo $descripcion; ?> </textarea>

                    </div>




                    <button class="btn btn-success" name="editar">Editar</button>





                </form>

            </div>

        </div>

    </div>

</div>

<?php include("includes/footer.php") ?>