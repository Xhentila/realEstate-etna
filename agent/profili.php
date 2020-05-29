<!-- Kjo ehste faqja qe do te shaqet kur user bene view more pas search te agjentin  -->
<?php 
    include_once('../header.php'); 
    // include_once('../shared/navbar.php');
    require('../database/db_connection.php');


 
    if(isset($_POST['searchagent']))
    {
        $agent_id = $_POST['agendId'];


    $sql = "SELECT * FROM `agents` INNER JOIN `qyteti` ON `agents`.`qyteti_id`= `qyteti`.`qyteti_id` 
            INNER JOIN `prona` ON  `prona`.`agent_id` =  `agents`.`id`     
     WHERE `agents`.`id` = '$agent_id' ";

    $result = mysqli_query($con, $sql);
    $result_row = mysqli_num_rows($result);
    
    if($result_row == 0){
        header('Location: ../index.php');
    }else{
        while($row= mysqli_fetch_array($result)){

    ?>
<div class="container-fluid " >
    <div class="row" id="searchHeader"></div>
    <div class="row" >
        <?php
            
            

            
            echo'
                    <div class="col-md-3" > </div>
                    <h3 > Agjenti Imobiliar: '.$row['emri'].' '.$row['mbiemri'].' </h3></div>
                    <div  ><h5 style="font-weight: 500;">Agjenti operon ne qytetin e: '.$row['qyteti'].'</h5></div>
                    <div  ><h5 style="font-weight: 500;"> TELEFON: '.$row['telefon'].'</h5></div>
                    <div > <h5 style="font-weight: 500;"> E-MAIL: '.$row['email'].'</h5></div> ';
            }
        }
    }
?>
</div>