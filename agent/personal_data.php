<!-- Kjo eshte faqja qe do te ta shohi vet agjenti ku mundet edhe te modifikoj te dhenat  -->

<?php 
session_start();
include_once '../header.php'; 
require '../database/db_connection.php';

if(isset($_SESSION['nipt']))
{ 
?>
<style>
<?php include('../admin/admin.css')?>
</style>


<?php 
include_once '../agent/menu.php';

    $nipt = $_SESSION['nipt'];

    
    $query_exe = mysqli_query($con, "SELECT * FROM `agents` WHERE `agents`.`nipt` = $nipt");
    $query_row = mysqli_num_rows($query_exe);

    if($query_row >=1){
        while($row =  mysqli_fetch_array($query_row)){
            echo'
            <div class="col-md-3" > </div>
            <h3 > Agjenti Imobiliar: '.$row['emri'].' '.$row['mbiemri'].' </h3></div>
            <div  ><h5 style="font-weight: 500;">Agjenti operon ne qytetin e: '.$row['qyteti'].'</h5></div>
            <div  ><h5 style="font-weight: 500;"> TELEFON: '.$row['telefon'].'</h5></div>
            <div > <h5 style="font-weight: 500;"> E-MAIL: '.$row['email'].'</h5></div> ';
        }
    }


}?>

