<?php include ("db.php")?>


<?php include ("includes/header.php")?>

<div class="container p-4">
   

    <div class="row">
        
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();} ?>

        <div class="card card-body">
            <form action="save_task.php" method="POST">
                <div class="form-group">
                    <input type="text" name="title class" class="form-control"
                    placeholder="Ingrese Titulo" autofocus>

                    <div class="form-group">
                        <textarea name="description" id=""  rows="2" class="form-control"
                        placeholder="Ingrese Descripcion"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="save_task" value="Guardar Tarea">
                </div>
            </form>
        </div>



        </div>

        <div class="col-m-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo<t/th>
                        <th>Descripcion<t/th>
                        <th>Fecha de Creacion<t/th>
                        <th>Acciones<t/th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $query="SELECT * FROM task";
                    $result_task= mysqli_query($conn, $query);
                    

                    while($row = mysqli_fetch_array($result_task) ){?>
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['created_At']?></td>
                            <td>

                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>

                                </a> 
                                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>     
                            </td>
                        </tr>
                    <?php }?>
                
                </tbody>    
            </table>

        </div>
        
    </div>
</div>

<?php include("includes/footer.php")?>    



       