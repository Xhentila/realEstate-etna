<?php 
    require 'database/db_connection.php';



    if(isset($_POST['prona_id'])){
        $prona_id = intval($_POST['prona_id']);
        $details_prona = "SELECT * FROM `prona_adresa` 
        inner join `prona` on `prona`.`prona_id` = `prona_adresa`.`prona_id`
        inner JOIN `adresa` on `adresa`.`adresa_id` = `prona_adresa`.`adresa_id`
        inner join `qyteti` on `qyteti`.`qyteti_id` = `prona_adresa`.`qyteti_id`
        WHERE `prona`.`prona_id` ='$prona_id' ";
        $details_result = mysqli_query($con, $details_prona);
        $details_row = mysqli_num_rows($details_result);
echo $prona_id;
        if( $details_row >= 1){        
            while($row = mysqli_fetch_array($details_result)){

                echo '




                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detajet e Pronave</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="prona_details">
                                <h4>'.$row['titulli'].' </h4>
                                <p>'.$row['pershkrimi'].' </p>
                            
                            <div class="row"> 
                                <div class="col-md-5">
                                    <p>CMIMI: '.$row['cmimi'].' </p>
                                    <p>HAPESIRA:'.$row['hapsira'].' </p>
                                </div>
                                <div class="col-md-5">
                                    <p>QYTETI:'.$row['qyteti'].' </p>
                                </div>
                            </div>
                        
                               
                               
                            </div>
                            <div class="modal-footer">
                                    

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                
               

                
                ';



            }
        }
        else {
            echo 'No Rows';
        }
    }