<?php 
    require '../database/db_connection.php';


    if(isset($_POST['u-submit'])) 
    { 
        



            //seeding data to db
            $p_space = mysqli_real_escape_string($con, $_POST['p_space']);
            $p_certif = mysqli_real_escape_string($con,$_POST['p_certif']);
            $p_price = mysqli_real_escape_string($con, $_POST['p_price']);
            $p_contact = mysqli_real_escape_string($con, $_POST['p_contact']);
            $p_st = mysqli_real_escape_string($con, $_POST['p_st']);
            $p_nr = mysqli_real_escape_string($con, $_POST['p_nr']);
            $p_ngjarje = mysqli_real_escape_string($con,$_POST['ngjarje']);
            $p_lloji_prones = mysqli_real_escape_string($con,$_POST['lloji_prones']);
            $p_zona = mysqli_real_escape_string($con, $_POST['p_zona']);
            $p_title = mysqli_real_escape_string($con, $_POST['p_title']);
            $p_pershkrimi = mysqli_real_escape_string($con, $_POST['p_pershkrimi']);
            $current_time  = date("Y-m-d", time());
            $adresa_id = $_POST['adresaId'];
            $p_id = $_POST['pronaId'];



            //save the image data and extensions 
            $p_img = $_FILES['p_img']['name'];
            $p_img_type = $_FILES['p_img']['type'];
            $p_img_tmp = $_FILES['p_img']['tmp_name'];

            //exension
            $img_ext = explode('.',$p_img);
            $allow_ext = strtolower(end($img_ext));
            $allow = array('jpg', 'jpeg', 'png');
            $target = "web_photo/".$p_img;

            


            $sql = "UPDATE `prona` SET `hapsira`=?,`certi_prones`=?,`cmimi`=?,`titulli`=?,`pershkrimi`=?,`content_img`=?,`nr_kontakti`= ?,`register_date`=? WHERE `prona_id`= ? ";
            $stmt= $con->prepare($sql);

            $stmt->bind_param('iiisssisi', $p_space, $p_certif, $p_price,$p_title, $p_pershkrimi, $target, $p_contact , $current_time, $p_id);
            $stmt->execute();




            $sql2 = "UPDATE `adresa` SET `zona`= ?,`rruga`=?,`numri`=?  WHERE `adresa_id`=?";
            $stmts=$con->prepare($sql2);
            $stmts->bind_param('ssii', $p_zona, $p_st, $p_nr,$adresa_id );
            $stmts->execute();
            
            header('Location: ./dashboard.php?success');
        }else{
            header('Location: ./dashboard.php?error');
        }
        

 