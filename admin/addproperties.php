
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
    if(isset($_POST['p-submit']))
    {
        if(!empty($_POST['p_space']) && !empty($_POST['p_certif']) && !empty($_POST['p_price']) && !empty($_POST['p_contact']) && !empty($_POST['p_st']) && !empty($_POST['p_nr']) && !empty($_POST['p_zona']) && !empty($_POST['p_title']) &&!empty($_POST['p_pershkrimi']))
        {
            //seeding data to db
            $p_space = mysqli_real_escape_string($con, $_POST['p_space']);
            $p_certif = mysqli_real_escape_string($con,$_POST['p_certif']);
            $p_price = mysqli_real_escape_string($con, $_POST['p_price']);
            $p_contact = mysqli_real_escape_string($con, $_POST['p_contact']);
            $p_st = mysqli_real_escape_string($con, $_POST['p_st']);
            $p_nr = mysqli_real_escape_string($con, $_POST['p_nr']);
            $p_qyteti = mysqli_real_escape_string($con,$_POST['qyteti']);
            $p_ngjarje = mysqli_real_escape_string($con,$_POST['ngjarje']);
            $p_lloji_prones = mysqli_real_escape_string($con,$_POST['lloji_prones']);
            $p_zona = mysqli_real_escape_string($con, $_POST['p_zona']);
            $p_title = mysqli_real_escape_string($con, $_POST['p_title']);
            $p_pershkrimi = mysqli_real_escape_string($con, $_POST['p_pershkrimi']);
            $current_time  = date("Y-m-d", time());
            $agent_id = $_SESSION['admin_id'];


            //save the image data and extensions 
            $p_img = $_FILES['p_img']['name'];
            $p_img_type = $_FILES['p_img']['type'];
            $p_img_tmp = $_FILES['p_img']['tmp_name'];

            //exension
            $img_ext = explode('.',$p_img);
            $allow_ext = strtolower(end($img_ext));
            $allow = array('jpg', 'jpeg', 'png');
            $target = "web_photo/".$p_img;
            // move_uploaded_file($p_img_tmp, $target);


            //kontrollo nese ekziston rrsht ne db me kete te dhene me pare qe duhet te jete unike
            $stmt_1= "SELECT `certi_prones` FROM `prona` WHERE certi_prones = $p_certif ";
            $result = mysqli_query($con, $stmt_1);
            $row = mysqli_num_rows($result);

            if($row == 0 ){

                //query to insert prona data
                $stmt = $con->prepare("INSERT INTO `prona`( `agent_id`, `ngjarje_id`,`lloji_id`,  `hapsira`, `certi_prones`, `cmimi`, `titulli`, `pershkrimi`, `qyteti_id`, `content_img`, `nr_kontakti`,`register_date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("iiissississs",$agent_id, $p_ngjarje, $p_lloji_prones,  $p_space, $p_certif, $p_price, $p_title, $p_pershkrimi, $p_qyteti, $target,  $p_contact, $current_time);
                $stmt->execute();
                if($stmt->execute()){
                    $_SESSION['msg'] = "Added Succesfully ";
                    $_SESSION['alert']= "alert alert-warning";
                }

                //query to insert adress dat
                $stmts = $con->prepare("INSERT INTO `adresa` (`zona`,`qyteti_id`, `rruga`,`numri`) VALUES (?,?,?,?)" );
                $stmts->bind_param("ssss", $p_zona,$p_qyteti, $p_st, $p_nr);
                $stmts->execute();

                header('Location: ../admin/addproperties.php/'.$agent_id.'?Success=added');
            }else{
                $_SESSION['msg'] = "Property was not added  ";
                $_SESSION['alert']= "alert alert-success";
                header('Location: ../admin/addproperties.php/'.$_SESSION['name'].'?warning=alreadyadded');
            }

        } else {
            header('Location: ../admin/addproperties.php/'.$_SESSION['name'].'?error');
        }
    }




?>

<main>
    <?php require '../admin/adm_menu.php';?>

    <div class="container center-div">
            <div class="row">
                <!-- Shfaqim error message in the page -->
                <div class="col-md-9" style="margin: 30px">
                    <?php
                        if(isset($_SESSION['msg'])){?>
                            <div class="<?= $_SESSION['alert'] ?>">
                                <?= $_SESSION['msg'];?>
                            </div>
                        <?php }?>
                </div>
                <div class="col-lg-9 center"></div>
            </div>
            <div class="row">
                <div class="col-md-12 " id="addpropform"  style="margin-top: 48%">
                    <p >Shtoni pronat tuaja ketu!</p>
                    <hr />
                    <form action="addproperties.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="p_space" placeholder="Hapesira*" required>
                            <input type="text" name="p_certif" placeholder="Nr Certifikates*" required/>
                            <input type="text" name="p_price" placeholder="Çmimi*" required>
                            <input type="text" name="p_contact" placeholder="Nr Kontakti*" required>
                        </div>
                        <!-- Here are the dropdown selectios -->
                        <fieldset >
                            <legend> Adresa </legend>
                            <div class="form-group">
                                <input type="text" name="p_st" placeholder="Rruga*" required >
                                <input type="text" name="p_nr" placeholder="Numri i Prones" >
                            
                                <input type="text" name="p_zona" placeholder="Zona*" required>
                                <select name="qyteti" id="selectForm" required>
                                    <?php 
                                        $query = "SELECT * FROM `qyteti` ";
                                        $result_city = mysqli_query($con, $query);
                                        if($result_city )
                                        {
                                            while($row = mysqli_fetch_array($result_city))
                                            {
                                                
                                                    echo '<option value="'.$row['qyteti_id'].'">'.$row["qyteti"].'</option>';
                                            
                                            }
                                        }
                                    ?>    
                                </select>
                            </div>
                            <div class="form-group">
                            <!-- drop down selection for property type  -->
                                <select name="lloji_prones"  id="selectForm" required>
                                    <?php 
                                        $query_lloji = "SELECT * FROM `lloji_prones` ";
                                        $result_lloji = mysqli_query($con, $query_lloji);
                                        if($result_lloji )
                                        {
                                            while($row = mysqli_fetch_array($result_lloji))
                                            {
                                                
                                                    echo '<option value="'.$row['lloji_prones_id'].'">'.$row["lloji"].'</option>';
                                            
                                            }
                                        }
                                    ?>    
                                </select>

                            <!-- drop down selection for event type  -->
                                <select name="ngjarje" id="selectForm" required>
                                    <?php 
                                        $query_event = "SELECT * FROM `ngjarje` ";
                                        $result_event = mysqli_query($con, $query_event);
                                        if($result_event )
                                        {
                                            while($row = mysqli_fetch_array($result_event))
                                            {
                                                
                                                    echo '<option value="'.$row['ngjarje_id'].'">'.$row["ngjarja"].'</option>';
                                            
                                            }
                                        }
                                    ?>    
                                </select>
                            </div>
                        </fieldset >

                        <div class="form-group">
                            <input type="text" name="p_title" placeholder="Titulli*" id="titProna"  required/>
                            <input type="file" name="p_img" value="" multiple=""  />                            
                        </div>
                        <div class="form-group">
                            <textarea name="p_pershkrimi" placeholder="Pershkrimi i prones*" required> </textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="p-submit" value="Add Prop *" />
                            
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
<!-- script to remove after 3 seconds the alert in the page  -->
<script>
$(document).ready(() => {
    setTimeout(() => {
        $(".alert").remove();
    }, 3000);
});
</script>