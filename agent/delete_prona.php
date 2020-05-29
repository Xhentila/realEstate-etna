

<?php 
    session_start();
    include('../header.php'); 
    require '../database/db_connection.php';



    if(isset($_POST['delete']))
    
    {
        $id = $_POST['deleterow'];
        
        // echo $id;
        
       
        $stmt = "DELETE FROM `prona` INNER JOIN  `adresa` ON  `adresa`.`adresa_id` = `prona`.`adresa_id` INNER JOIN `prona_adresa` ON `prona_adresa`.`prona_id` = `prona`.`prona_id`   WHERE `prona_id`= $id";
        // $stmt->bind_param('i', $id);
        // $stmt->execute();

        mysqli_query($con, $stmt);
        
        header('Location: ./dashboard.php?success=deletion');

         
    }


?>