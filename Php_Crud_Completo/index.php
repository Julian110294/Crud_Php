<?php  include("conexion.php");  ?>



<?php include("includes/header.php"); ?>



    <div class="container p-4">
    
        <div class="row">
        
            <div class="col-md-4">


                <?php if(isset($_SESSION['message'])) { ?>

                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">


                            <?= $_SESSION['message'] ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>


                    </div>

                <?php session_unset(); }?>

            
                <div class="card card-body">
                
                    <form action="guardar.php" method="POST">
                    
                        
                        
                        <div class="form-group">
                        
                            <input type="text" name="tarea" class="form-control" placeholder="Nombre de la Tarea" autofocus>

                        </div>


                        <div class="form-group">
                        
                        <input type="text" name="responsable" class="form-control" placeholder="Responsable de la Tarea" autofocus>
                        
                        </div>



                        <div class="form-group">
                        
                        <textarea name="descripcion" rows="6" class="form-control" placeholder="Descripcion de la Tarea" autofocus></textarea>
                        
                        </div>


                        <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar Tarea">



                    </form>

                </div>

            </div>



<!-- =========================================================================================================== -->




        <div class="col-md-8">
            
                <table class="table table-bordered">
                
                    <thead>
                    
                        <tr>
                        
                            <th>Tarea</th>
                            <th>Responsable</th>
                            <th>Descripcion</th>                    
                            <th>Opciones</th>

                        </tr>

                    </thead>



                    <tbody>
                    
                        <?php
                        
                            $query = "SELECT * FROM tareas";
                            $resultado_tareas = mysqli_query($conexion, $query);


                            while($row = mysqli_fetch_array($resultado_tareas))
                            { ?>

                                <tr>
                                
                                    <td> <?php echo $row['tarea'] ?> </td>
                                    <td> <?php echo $row['responsable'] ?> </td>
                                    <td> <?php echo $row['descripcion'] ?> </td>

                                    <td>
                                    
                                        <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary"> <i class="fas fa-marker"></i> </a>

                                        <a href="borrar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </a>

                                    </td>


                                </tr>




                            <?php } ?>



                    </tbody>



                </table>

        </div>




        </div>

    </div>



<?php include("includes/footer.php"); ?>