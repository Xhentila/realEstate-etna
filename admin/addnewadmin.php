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
    
    if(isset($_POST['adm_submit'])){

        if(!empty($_POST['adm_name']) && !empty($_POST['adm_sname']) &&  !empty($_POST['adm_email']) && !empty($_POST['adm_passw']) ){
            $adm_name = mysqli_real_escape_string($con,$_POST['adm_name']);
            $adm_sname = mysqli_real_escape_string($con,$_POST['adm_sname']);
            $adm_email = mysqli_real_escape_string($con,$_POST['adm_email']);
            $adm_passw = mysqli_real_escape_string($con,$_POST['adm_passw']);
        
            //passw encrypt (L3) -> more secure to add a string unique per each row -> Large db
            $encrypt_passw = md5($adm_passw."$$$$$$");
            $email = stripslashes($adm_email);

            $stmt_1= "SELECT `name` FROM `admin` WHERE `name` ='$adm_name' ";
            $result = mysqli_query($con, $stmt_1);
            $row = mysqli_num_rows($result);

            if($row = 0 ){
                //insert the data into db
                $sql= "INSERT INTO admin (`surname`,`email`, `password`, `name`) VALUES(?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssss", $adm_sname,$email, $encrypt_passw,$adm_name);
                $stmt->execute();

                //the url redirect to after submiting 
                header('Location: ../admin/addnewadmin.php/'.$_SESSION['name'].'?success=adminadded');

                //ende nuk po shtoj dot email funksionon ndryshe 
                //ndoshta mysql nuk ka charset=utf-8??
            }else{

                header('Location: ../admin/addnewadmin.php/'.$_SESSION['name'].'?warning=alreadyadded');
            }
        }
        else 
        {

            if(!isset($_POST['adm_name'])){
                $error .= "Place your name. <br />";
            }
            if(!isset($_POST['adm_sname'])){
                $error .= "Place your name. <br />";
            }
            if(!isset($_POST['adm_email'])){
                $error .= "Place your e-mail. <br />";
            }
                    
            header('Location: ../admin/addnewadmin.php/'.$_SESSION['name'].'?error='.$error);
        }
    }
    

?>

<main>
    <?php 
         require '../admin/adm_menu.php';
    ?>

    <div class="container center-div">
            <div class="row">
                <div class="col-lg-9 center">
                    <p>You can add below a New Admin!</p>
                    <hr />
                    <div class="error-text"><?php echo $error; ?></div>
                    <form action="addnewadmin.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="adm_name" placeholder="New Admin Name" required>
                            <input type="text" name="adm_sname" placeholder="New Admin Surname"required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="adm_email" placeholder="New Admin Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="adm_passw" placeholder="New Admin Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="adm_submit" value="Add Admin">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>
<?php }else{?>

    <div class="container row"><p><i>You are Not allowed to access this page! </i></p><a  href="../index.php"> here </a></div> 
<?php
}

?>