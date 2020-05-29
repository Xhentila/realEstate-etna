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

    if(isset($_POST['event_submit']))
    {
        if(!empty($_POST['adm_event']))
        {
            $adm_event = mysqli_real_escape_string($con,$_POST['adm_event']);

            $stmt_1= "SELECT `ngjarja` FROM `ngjarje` WHERE ngjarja ='$adm_event' ";
            $result = mysqli_query($con, $stmt_1);
            $row = mysqli_num_rows($result);

            if($row = 0 ){

                $stmt = $con->prepare("INSERT INTO `ngjarje` (`ngjarja`) VALUES (?);");
                $stmt->bind_param("s", $adm_event);
                $stmt->execute();
                
                header('Location: ../admin/addevent.php/'.$_SESSION['name'].'?success=eventadded');
            }else{
                $error .= "This City is already in added!";
                header('Location: ../admin/addevent.php/'.$_SESSION['name'].'?warnin=alreadyadded');
            }
            //asgje nuk shkon error por asgje nuk ruhet ne DB ???

        }else{

            $error_fields .= "Empty fields";
            header('Location: ../admin/addevent.php/'.$_SESSION['name'].'?error=emptyfilds');
        }
    }

?>

<main>
    <?php require '../admin/adm_menu.php';?>

    
    <div class="container center-div">
            <div class="row">
                <div class="col-md-6 center">
                    <p>You can add below a New Event!</p>
                    <hr />
                    <form action="addevent.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="adm_event" placeholder="New Event" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="event_submit" value="Add Event">
                        </div>
                    </form>
                </div>
                <div class="col-md-3" id="error"> 
                    <?php 
                        if( strlen($error) > 0){echo $error; };
                        if(strlen($error_fields) > 0) {echo $error_fields;};
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