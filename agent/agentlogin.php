<?php 
    session_start();

    require '../database/db_connection.php';

    
    if(isset($_POST['login']))
    {
        $nipt = mysqli_real_escape_string($con,$_POST['nipt']) ;
    
        //encrypt passw
        $passw = $_POST['passw'];
        $encrypt_password = md5($passw.'1@3!');

        if($nipt){
         
           $_SESSION['nipt'] = $nipt;

            //id	emri	mbiemri	email	mosha	gjinia	eksperience	passw	nipt	telefon	register_date
            $sql = " SELECT * FROM `agents` WHERE `nipt` = '$nipt' AND `passw` = '$encrypt_password' ";

            $query = mysqli_query($con, $sql);
            $row = mysqli_num_rows($query); //the row with the agent's data 
            

            if($row == 1 ){

                header('Location: dashboard.php/ag='.$_SESSION['nipt']);

            }else{
                header('Location: ../index.php?errorcredentials');
            }

        }else{header('Location: ../index.php?entercredentials');
            
        }

    }
    ?>