<style>
    <?php include('../admin/admin.css')?>
</style>


<?php 
    session_start();
    include('../header.php'); 
    require '../database/db_connection.php';

    if(isset($_SESSION['name']))
    { 



    if(isset($_POST['delete']))
    {
        $id = $_POST['delete'];
        
        echo $id;
        
        // mysqli_query($con, $query);
        $stmt = $con->prepare("DELETE FROM `prona` WHERE prona_id= $id");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        header("Location: ../admin/adminmainpage.php?success=deletion");

         
    }

}
?>