<?php 
   session_start();
   require '../database/db_connection.php';

    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($con,$_POST['email']);
        $current_time  = date("Y-m-d", time());


        $sql = "INSERT INTO `abonime` (`email`, `abonim_date`) VALUES (?, ?)";
        $stmt = $con->prepare( $sql);
        $stmt-> bind_param('ss', $email,$current_time);
        $stmt->execute();


        header('Location: ../index.php?success=abonim');


    }else{
        header('Location: ../index.php?no-abonim');

    }   
            

?>