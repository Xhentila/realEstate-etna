<?php 

    include_once 'header.php';
    include_once 'shared/navbar.php';
    require 'database/db_connection.php';


?>



<main>

<div class="container-fluid search " style="background-image: url('photo/slider_1.jpg'); "> 
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="center" style="color:#fff;"> Pronat sipas kerkeses suaj</h2>
            <h4 class="center" style="color:#fff;"> Gjeni pronen qe ju jep Komfortin dhe Ploteson nevojat tuaja!</h4>
            <p class="center" style="color:#fff;">Mos Hezitoni te na kontaktoni per nje verifikim me te personalizuar dhe zpecifik te kerkesave tuaja.</6>
          
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
    <div class="container center-div" id="">
        <div class="row">
            <div class="col-xs-2"></div>
            <?php 
                if(isset($_POST['home-search']))
                {
                    $qyteti = $_POST['qyteti'];
                    $ngjarje = $_POST['ngjarje'];
                    $lloji = $_POST['prona'];
                    $cmimi = $_POST['cmimi'];
                    $hapesira= $_POST['hapesira'];


                    $query = "SELECT * FROM `prona` INNER JOIN `ngjarje`ON `prona`.`ngjarje_id`= `ngjarje`.`ngjarje_id` 
                                INNER JOIN `qyteti` ON `prona`.`qyteti_id` = `qyteti`.qyteti_id 
                                INNER JOIN `lloji_prones` ON `prona`.`lloji_id` = `lloji_prones`.`lloji_prones_id` 
                                WHERE `prona`.`lloji_id`= '$lloji' AND `prona`.`qyteti_id` = '$qyteti' AND `prona`.`ngjarje_id`= '$ngjarje'  AND `prona`.`cmimi`<='$cmimi' ";
                    $pronat = mysqli_query($con, $query);
                    $prona = mysqli_num_rows($pronat);

                    if($prona > 0){
                        while($resultCheck = mysqli_fetch_assoc($pronat)) {
                            switch ($hapesira){

                                case 60 :
                                    if($resultCheck['hapsira'] <= 60 ){
                                            echo ' 
                                                <div class="col-md-9" id="prona">
                                                    <table>
                                                        <tbody>
                                                            <tr> 
                                                                <h4 style="color: #FFA800">  '.$resultCheck['titulli'].'</h4>
                                                            </tr>
                                                            <tr>
                                                                <td> <img src="'.$resultCheck['content_img'].'" width="260px" height="180ppx"><br /></td>
                                                                <td>
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                <h6><small style="font-weight: 500;"> Ngjarja: '.$resultCheck['ngjarja'].'</small></h6>
                                                                                <h6> <small style="font-weight: 500;">Cmimi: '.$resultCheck['cmimi'].'</small></h6>
                                                                                <h6><small style="font-weight: 500;"> Qyteti: '.$resultCheck['qyteti'].'</small></h6>
                                                                                <h6><small style="font-weight: 500;"> Hapsira: '.$resultCheck['hapsira'].'m<sup>2</sup></small></h6></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                <p> Pershkrimi: '.substr($resultCheck['pershkrimi'], 0, 60).'</p>
                                                                                <button class="btn btn-info" href="#"> Lexo më shumë... </button></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                    
                                            '; 
                                    } else{
                                        echo 'Per momenti nuk mund t\'ju sugjerojme ne prone qe i perputhet kerkesave tuaja!';
                                    };
                                break;
                                case 75:
                                    if( ($resultCheck['hapsira'] <=115 ) &&($resultCheck['hapsira'] >= 75)){
                                        echo ' 
                                            <div class="col-md-9" id="prona">
                                                <table>
                                                    <tbody>
                                                        <tr> 
                                                            <h4 style="color: #FFA800">  '.$resultCheck['titulli'].'</h4>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td> <img src="'.$resultCheck['content_img'].'" width="260px" height="180ppx"><br /></td>
                                                            <td>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                            <h6><small style="font-weight: 500;"> Ngjarja: '.$resultCheck['ngjarja'].'</small></h6>
                                                                            <h6> <small style="font-weight: 500;">Cmimi: '.$resultCheck['cmimi'].'</small></h6>
                                                                            <h6><small style="font-weight: 500;"> Qyteti: '.$resultCheck['qyteti'].'</small></h6>
                                                                            <h6><small style="font-weight: 500;"> Hapsira: '.$resultCheck['hapsira'].'m<sup>2</sup></small></h6></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            <p> Pershkrimi: '.substr($resultCheck['pershkrimi'], 0, 60).'</p>
                                                                            <button class="btn btn-info" href="#"> Lexo më shumë... </button></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                
                                        '; 
                                    } else{
                                        echo 'Per momenti nuk mund t\'ju sugjerojme ne prone qe i perputhet kerkesave tuaja!';
                                    };
                                    break;
                                
                                case 115:
                                
                                    if( ($resultCheck['hapsira'] <=300 ) &&($resultCheck['hapsira'] >= 115) ){
                                            echo ' 
                                                <div class="col-md-9" id="prona">
                                                    <table>
                                                        <tbody>
                                                            <tr> 
                                                                <h4 style="color: #FFA800">  '.$resultCheck['titulli'].'</h4>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td> <img src="'.$resultCheck['content_img'].'" width="260px" height="180ppx"><br /></td>
                                                                <td>
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                <h6><small style="font-weight: 500;"> Ngjarja: '.$resultCheck['ngjarja'].'</small></h6>
                                                                                <h6> <small style="font-weight: 500;">Cmimi: '.$resultCheck['cmimi'].'</small></h6>
                                                                                <h6><small style="font-weight: 500;"> Qyteti: '.$resultCheck['qyteti'].'</small></h6>
                                                                                <h6><small style="font-weight: 500;"> Hapsira: '.$resultCheck['hapsira'].'m<sup>2</sup></small></h6></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                <p> Pershkrimi: '.substr($resultCheck['pershkrimi'], 0, 60).'</p>
                                                                                <button class="btn btn-info" href="#"> Lexo më shumë... </button></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                    
                                            '; }else{
                                                echo 'Per momenti nuk mund t\'ju sugjerojme ne prone qe i perputhet kerkesave tuaja!';
                                            };
                                    break;
                                    default:
                                        echo 'Per momentin nuk kemi asnje prone qe i perputhet Kerkesave tuaja!                                        '; 
                                break;
                            }
                            
                        }
                    }else{  
                        echo 'Per momentin nuk kemi asnje prone qe i perputhet Kerkesave tuaja!                                        '; 

                            // header('Location: /searchresult.php?noresults'); //bene konflikt me perfshirjen e navbar .. kontrollojeme vone 
                    } 
                        ?>
        </div>
    </div>
    <div class="container center-div" id="product">
        <hr />
        <div class="row">
            <h4> Sugjerime: </h4>
            <div class="col-md-2"></div>
                    <?php
                    $query_suggest = "SELECT * FROM `prona` INNER JOIN `ngjarje`ON `prona`.`ngjarje_id`= `ngjarje`.`ngjarje_id` 
                                INNER JOIN `qyteti` ON `prona`.`qyteti_id` = `qyteti`.qyteti_id 
                                INNER JOIN `lloji_prones` ON `prona`.`lloji_id` = `lloji_prones`.`lloji_prones_id` 
                                WHERE `prona`.`qyteti_id` = '$qyteti' AND `prona`.`lloji_id`= '$lloji'";

                    $pronat_suggest = mysqli_query($con, $query_suggest);
                    $prona_suggest = mysqli_num_rows($pronat_suggest);
                    // $space <=60 &&
                    // $space >=60 && $space <=115 &&
                    // $space >=115 &&

                    if($prona_suggest > 0){
                        while($resultCheck = mysqli_fetch_assoc($pronat_suggest)) {
                            echo ' </div>
                            </div>
                                <div class="col-md-9" id="prona">
                                    <table>
                                        <tbody>
                                            <tr> 
                                                <h4 style="color: #FFA800">  '.$resultCheck['titulli'].'</h4>
                                                
                                            </tr>
                                            <tr>
                                                <td> <img src="'.$resultCheck['content_img'].'" width="260px" height="180ppx"><br /></td>
                                                <td>
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                <h6><small style="font-weight: 500;"> Ngjarja: '.$resultCheck['ngjarja'].'</small></h6>
                                                                <h6> <small style="font-weight: 500;">Cmimi: '.$resultCheck['cmimi'].'</small></h6>
                                                                <h6><small style="font-weight: 500;"> Qyteti: '.$resultCheck['qyteti'].'</small></h6>
                                                                <h6><small style="font-weight: 500;"> Hapsira: '.$resultCheck['hapsira'].'m<sup>2</sup></small></h6></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <p> Pershkrimi: '.substr($resultCheck['pershkrimi'], 0, 60).'</p>
                                                                <button class="btn btn-info" href="#"> Lexo më shumë... </button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                    
                            '; 

                        }
                    
                    }

                } 
            ?>
        </div>         
    </div> 
</main>

<?php 
include 'footer.php';
?>