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
    if(isset($_POST['propertype_submit']))
    {
        if(isset($_POST['adm_propertytype']))
        {
            $adm_propertytype = mysqli_real_escape_string($con,$_POST['adm_propertytype']);

            $stmt_1= "SELECT `lloji` FROM `lloji_prones` WHERE `lloji` ='$adm_propertytype' ";
            $result = mysqli_query($con, $stmt_1);
            $row = mysqli_num_rows($result);

            if($row = 0 ){

                $stmt = $con->prepare("INSERT INTO lloji_prones(`lloji`) VALUES (?)");
                $stmt->bind_param("s", $adm_propertytype);
                $stmt->execute();

                //asgje nuk shkon error por asgje nuk ruhet ne DB ???

                header('Location: ../admin/addpropertytype.php/'.$_SESSION['name'].'?success=eventadded');
            }else{

            }


        }else{
            header('Location: ../admin/addpropertytype.php?error=emptyfilds');
        }
    }

?>


<main>
    <?php require '../admin/adm_menu.php';?>

    <div class="container center-div">
            <div class="row">
                <div class="col-lg-9 center">
                    <p>You can add below a New Property Type!</p>
                    <hr />
                    <form action="addpropertytype.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="adm_propertytype" placeholder="New Property Type" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="propertype_submit" value="Add Property">
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