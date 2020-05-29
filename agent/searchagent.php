<!-- faqja qe do te shfaqi rezultatet e kerkimit te agjentit sipas qytetit -->

<?php 
    include_once('../header.php'); 
    include_once('../shared/navbar.php');
    require('../database/db_connection.php');
    
    
    if(isset($_POST['search_agent'])){
    
    
        $qyteti = mysqli_real_escape_string($con, $_POST['qyteti']);

        $sql = "SELECT * FROM `agents` INNER JOIN `qyteti` ON `agents`.`qyteti_id`= `qyteti`.`qyteti_id`  WHERE `agents`.`qyteti_id`= '$qyteti' ";
        
        $result = mysqli_query($con, $sql);
        $result_row = mysqli_num_rows($result);
        
        if($result_row === 0){
            header("Location: ../index.php");
        }else{
            
        ?>
<main>
    <div class="container-fluid " >
        <div class="row" id="searchHeader">
        <div class="col-md-3" >
            </div>
                <h3 id="searchtext"> Agjentet tane </h3>
            </div>      
        <?php
            
            while($result_data= mysqli_fetch_array($result)){
               
                //rezultatet e agjentit             
                echo'
                        
                        <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
                            <div class = "row" >
                                <div class="col-md-9" id="prona">
                                    <h4 style="color: #FFA800">  '.$result_data['emri'].' '.$result_data['mbiemri'].'</h4>
                                            
                                </div>
                            </div>
                                <div class = "row">
                                    <div class="col-xs-1"></div>
                                    <div class="col-md-4"> <img src="logo.png" width="200px" height="150ppx"><br /></div>
                                    <div class="col-md-6">
                                        <h6><small style="font-weight: 500;"> MOSHA: '.$result_data['mosha'].'</small></h6>
                                        <h6> <small style="font-weight: 500;">NIPT: '.$result_data['nipt'].'</small></h6>
                                        <h6><small style="font-weight: 500;"> QYTETI: '.$result_data['qyteti'].'</small></h6>
                                        <h6><small style="font-weight: 500;"> TELEFON: '.$result_data['telefon'].'</small></h6></td>
                                    
                                                
                                        <form action="../agent/profili.php" method="POST">
                                            <input type="hidden" value="'.$result_data['id'].'" name="agendId" />
                                            <button type="submit"  name="searchagent" class="btn btn-info" > Lexo më shumë... </button>
                                        </from>
                                        <hr />
                                    </div>
                            </div>
                        </div>
                    </div>


                ';

            }
        }
    
    
    }


include ('../footer.php');
?>

