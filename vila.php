<?php 
    include 'header.php' ;
    include 'shared/navbar.php' ;
    require 'database/db_connection.php';
?>



<main>


    <div class="container-fluid " style="background-image:url(photo/slider_2.jpg); margin-top: -8%;">
        <div class="row" id="servHeader">
            <div class="col-md-3"></div>
                <h3 style="color: #FFF"> VILA </h3><br />
                
        </div>
        </div>
    </div>

    <div class="container-fluid ">
        <!-- Rreshti i 3 -->

        <div class="row">

            <div class="col-md-2"  ></div>
            <!-- <div class="col-md-8"  >                
                <a class="btn" style="color: #333; border: 2px solid #333; padding: 1%; margin-top:10px; border-radius: 8px;" href="services.php"> Kthehu pas </a>
            </div> -->
            
            <?php

                $prona = "SELECT * FROM `prona_adresa` inner join `prona` on `prona`.`prona_id` = `prona_adresa`.`prona_id`
                inner JOIN `adresa` on `adresa`.`adresa_id` = `prona_adresa`.`adresa_id`
                inner join `qyteti` on `qyteti`.`qyteti_id` = `prona_adresa`.`qyteti_id`
                
                WHERE  `prona`.`lloji_id` = (SELECT `lloji_prones_id` FROM `lloji_prones` WHERE `lloji_prones`.`lloji` = 'Vila') ";
                $result = mysqli_query($con, $prona);
                $resultcheck = mysqli_num_rows($result);

                if( $resultcheck == 0)
                {
                    header('Location: ./services.php');
                }else{
                    while ($row = mysqli_fetch_array($result))
                    {
                        $hapesira = $row['hapsira'];
                        $bath;
                            if($hapesira<= 60){
                                $hapesira ='1 Dopio';
                                $bath = '1';
                            }else if ($hapesira>60 && $hapesira<=115){
                                $hapesira ='1 + 2 ';
                                $bath = '1';

                                }else {
                                $hapesira ='2 Dopio + 2 ';
                                $bath = '2';

                                }
                        echo'
                        

                            <div class="col-md-3 mb-5 shadow p-3 mb-5 bg-white rounded" id="vila1" >
                                <div class="media-38289">
                                    <a href="property-single.html" class="d-block"><img src="'.$row['content_img'].'" alt="vila" class="img-fluid"></a>
                                    <div class="text">
                                    <h5> '.$row['titulli'].'</h5>
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>'.$row['hapsira'].' Sq Ft.</span></div>
                                            <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>'.$hapesira.'<i class="fa fa-bed" aria-hidden="true"></i></span></div>
                                            <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>'.$bath.'<i class="fa fa-bath" aria-hidden="true"></i>
                                                </span></div>
                                        </div>
                                        <h6 class="mb-3"><a href="#">'.$row['cmimi'].' ALL</a></h6>
                                        <span class="d-block small address d-flex align-items-center"> <span class="icon-room text-primary"></span> <span> Adresa: '.$row['rruga'].','.$row['zona'].' '.$row['qyteti'].'</span></span>
                                        <input type="button"  class="btn btn-primary view_data" name="details" value="Lexo me shume"  id="'.$row['prona_id'].'"  /> 
                                        
                                    </div>
                                </div>
                            </div>

                            
                        
    
                        ';
                    }
                }

// Lexo më shumë... '.$row['prona_id'].'</button> 

                
// data-target="#more"  data-toggle="modal"
// <form action="vila.php" method="post">
//     <input type="hidden" value="'.$row['prona_id'].'" name="agentId" />
//         <button type="submit"  class="btn btn-primary view_data" name="details"  data-target="#more"  data-toggle="modal" > Lexo më shumë... '.$row['prona_id'].'</button>  
// </form>

// if(isset($_POST['details'])){
//     $prona_id = $_POST['agentId'];
//     $details_prona = "SELECT * FROM `prona_adresa` 
//     inner join `prona` on `prona`.`prona_id` = `prona_adresa`.`prona_id`
//     inner JOIN `adresa` on `adresa`.`adresa_id` = `prona_adresa`.`adresa_id`
//     inner join `qyteti` on `qyteti`.`qyteti_id` = `prona_adresa`.`qyteti_id`
//     WHERE `prona`.`prona_id` ='$prona_id' ";
//     $details_result = mysqli_query($con, $details_prona);
//     $details_row = mysqli_num_rows($details_result);
// echo $prona_id;
//     if( $details_row >= 1){   
    // while($row = mysqli_fetch_array($details_result)){

    //         echo '
            
    //         <h4>'.$row['titulli'].' </h4>
    //         <p>'.$row['pershkrimi'].' </p>
            
    //         <div class="row"> 
    //             <div class="col-md-5">
    //                 <p>'.$row['cmimi'].' </p>
    //             </div>
    //             <div class="col-md-5">
    //                 <p>'.$row['hapsira'].' </p>
    //             </div>
    //         </div>

            
    //         ';
    //     } 
    // }
    // else {
    //     echo 'No Rows';
    // }
// }
                
?>

                <!-- Login Modal -->
                <!--    Lexo më shumë... </button> -->
                <div class="modal " id="more" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    
                </div>
            
            
                           
                
        </div>
        <!-- fund -->
    </div>
</main>
<?php 
            
include 'footer.php';

?>


<script> 

$(document).ready(()=> {
    $('.view_data').click(()=> {
        var prona_id = $('.view_data').attr("id");

        $.ajax({
            url:"prona_data.php",
            type:"POST",
            data: {prona_id:prona_id},
            dataType: "html",
            success:function(response){
                $("#more").html( response );
                $("#more").modal("show");
            }

        });

    });

});
</script>