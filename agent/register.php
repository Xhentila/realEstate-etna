<?php 
    session_start();
    include '../header.php' ; 
    require '../database/db_connection.php';

        if(isset($_POST['register'])){

            //ruajme te dhenat qe na vine nga form 
            $name = mysqli_real_escape_string($con,$_POST['emri']);
            $sname = mysqli_real_escape_string($con,$_POST['mbiemri']);
            $mosha = mysqli_real_escape_string($con,$_POST['mosha']);
            $ag_email = mysqli_real_escape_string($con,$_POST['email']);
            $passw = mysqli_real_escape_string($con,$_POST['passw']);
            $gjinia= mysqli_real_escape_string($con,$_POST['gjinia']);
            $telefon = mysqli_real_escape_string($con,$_POST['telefon']);
            $nipt = mysqli_real_escape_string($con,$_POST['nipt']);
            $qytete = mysqli_real_escape_string($con,$_POST['qytete']);
            $viteEksperience = mysqli_real_escape_string($con,$_POST['viteEksperience']);
            $current_time  = date("Y-m-d", time());
            $_SESSION['nipt'] = $nipt;


            
            // email encrypt dhe heqim simbolet e email
            $passw_secur = md5($passw.'1@3!');
            $email = stripslashes($ag_email);
            


            //kontorllo nese ky agjent ehste regjistruar me para
            //id	emri	mbiemri	email	mosha	gjinia	eksperience	passw	nipt	telefon	register_date
            $stmt_1= "SELECT `nipt`, `emri` , `mbiemri` FROM `agents` WHERE `nipt` ='$nipt' AND `emri` = '$name' AND `mbiemri`='$sname' ";
            $result = mysqli_query($con, $stmt_1);
            $row = mysqli_num_rows($result);

            if($row == 0){
                $sql= "INSERT INTO `agents` (`emri`,`mbiemri`,`email`,`mosha`,`gjinia`,`eksperience`,`passw`,`nipt`,`telefon`,`register_date`, `qyteti_id`) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("sssisisiisi", $name,$sname,$email, $mosha,$gjinia, $viteEksperience, $passw_secur,$nipt, $telefon, $current_time,$qytete);
                $stmt->execute();

                //the url redirect to after submiting 
                $nipti = $_SESSION['nipt'];
                header('Location: dashboard.php?success=register?'.$_SESSION['nipt']);


            }else{
                header('Location: ../index.php?ag=exist');

            }   

    }
?>

