<?php 

    session_start();
    include('../header.php'); 
    require '../database/db_connection.php';
    if(isset($_SESSION['name']))
    { 
?>
<style>
    <?php include('../admin/admin.css')?>
</style>

<?php
$error =  "";
$error_fields = "";
    if(isset($_POST['qyteti_submit']))
    {
        if(!empty($_POST['adm_city'])) 
        {
            //merr vleren e vendosur nga adm 
            $adm_city = mysqli_real_escape_string($con,$_POST['adm_city']);

            //kontrollon nese ka nje rrehst ne db me te njejten vlere
            $stmt_1= "SELECT `qyteti` FROM `qyteti` WHERE qyteti ='$adm_city' ";
            $result = mysqli_query($con, $stmt_1);
            $row = mysqli_num_rows($result);

            if($row = 0 ){

                //nese nuk ka nje vlese e shton 
                $stmt = $con->prepare("INSERT INTO qyteti (`qyteti`) VALUES (?);");
                $stmt->bind_param("s", $adm_city);
                $stmt->execute();

                header('Location: ../admin/addcity.php/'.$_SESSION['name'].'?success=cityadded');

            }else{

                //throws error nese e gjen nje vlere per te thene se eshte e shtuar
                $error .= "This City is already in added!";
                header('Location: ../addcity.php/'.$_SESSION['name'].'?warning=alreadyadded');

            }


        }
        else 
        {
            $error_fields .= "Emty field";
            header('Location: ../admin/addcity.php?error=emptyfields');
        }
    }

?>


<main>
<?php require '../admin/adm_menu.php';?>

    <div class="container center-div">
    
            <div class="row">
                <div class="col-md-6 center">
                    <p>You can add below a New City!</p>
                    <hr />
                    <form action="addcity.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="adm_city" placeholder="Add a new city" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="qyteti_submit" value="Add City">
                        </div>
                    </form>
                </div>
                <div class="col-md-3 id="error"> 
                    <?php 
                        if( strlen($error) > 0){echo $error; };
                        if(strlen($error_fields) > 0) {echo $error_fields;} ; 
                    ?> 
                </div>
            </div>
        </div>
</main>

<?php }else{?>

    <div class="container row"><p><i>You are Not allowed to access this page! </i></p><a  href="../index.php"> here </a></div> 
<?php
}

?>