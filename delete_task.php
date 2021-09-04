<?php 
    include ("db.php");

    if (isser($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM tasks WHERE id = $id";
        $result=mysqli_query    ($conn, $query);

        if(!$result){
            die("Query Failed");
        }
    }
 
?>