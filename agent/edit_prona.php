<?php 
    session_start();
    include '../header.php' ; 
    require('../database/db_connection.php');


    if(isset($_SESSION['nipt']))
    {?>
<style>
    <?php include('../admin/admin.css')?>
</style>
<?php
    if(isset($_POST['edit'])){
        $prona_id = $_POST['editrow'];
        $session = $_POST['session'];

        $details_prona = "SELECT * FROM `prona_adresa` 
        inner join `prona` on `prona`.`prona_id` = `prona_adresa`.`prona_id`
        inner JOIN `adresa` on `adresa`.`adresa_id` = `prona_adresa`.`adresa_id`
        inner join `qyteti` on `qyteti`.`qyteti_id` = `prona_adresa`.`qyteti_id`
        WHERE `prona`.`prona_id` = '$prona_id' ";


        $details_result = mysqli_query($con, $details_prona);
        $details_row = mysqli_num_rows($details_result);
        
        if( $details_row == 0)
            {
                echo 'No Rows';
            }else {     
                while($row = mysqli_fetch_array($details_result)){

                    ?>

                    <main>
                    <?php require '../agent/menu.php';?>

                     <div class="container center-div">
                        <div class="row">
                            <!-- Shfaqim error message in the page -->
                            <div class="col-md-9" style="margin: 30px">
                                <?php if(isset($_SESSION['msg'])){?>
                                        <div class="<?= $_SESSION['alert'] ?>">
                                            <?= $_SESSION['msg'];?>
                                        </div>
                                <?php }?>

                            </div>
                            <div class="col-lg-9 center"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 " id="addpropform"  style="margin-top: 20%">
                                <p >Editoni pronat tuaja ketu!</p>
                                <hr />
                                <form action="update.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $row['prona_id'] ;?>" name="pronaId" />
                                    <input type="hidden" value="<?php echo $row['adresa_id'] ;?>" name="adresaId" />
                                    <input type="hidden" value="<?php $session ?>" name="session" />
                                    <input type="text" name="p_space" placeholder="<?php echo $row['hapsira'];?>*" required>
                                    <input type="text" name="p_certif" placeholder="<?php echo  $row['certi_prones'];?>*" required/>
                                    <input type="text" name="p_price" placeholder="<?php echo $row['cmimi'];?>" required>
                                    <input type="text" name="p_contact" placeholder="<?php echo $row['nr_kontakti'];?>*" required>
                                </div>
                                <!-- Here are the dropdown selectios -->
                                <fieldset >
                                    <legend> Adresa </legend>
                                    <div class="form-group">
                                        <input type="text" name="p_st" placeholder="<?php echo $row['rruga'];?>*" required >
                                        <input type="text" name="p_nr" placeholder="<?php echo $row['numri'];?>" >
                                        <input type="text" name="p_zona" placeholder="<?php echo $row['zona'];?>*" required>
                                        
                                    </div>
                                    <div class="form-group">
                                    <!-- drop down selection for property type  -->
                                            
                                        </select>

                                    <!-- drop down selection for event type  -->
                                        
                                    </div>
                                </fieldset >

                                <div class="form-group">
                                    <input type="text" name="p_title" placeholder="<?php echo $row['titulli'];?>" id="titProna"  required/>
                                    <input type="file" name="p_img" value="" multiple=""  />                            
                                </div>
                                <div class="form-group">
                                    <textarea name="p_pershkrimi" placeholder="<?php echo $row['pershkrimi']; ?>" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" name="u-submit" value="Add Prop" />
                                    
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            <main>
    
<?php

            }
        }
        
    }
}else{
    echo '    <div class="container row"><p><i>You are Not allowed to access this page! </i></p><a  href="../index.php"> here </a></div> 
    ';
}
    


  ?>