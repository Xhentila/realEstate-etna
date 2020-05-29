<?php 
    include 'header.php' ;
    include 'shared/navbar.php';
    require 'database/db_connection.php';
?>



<main>


    <div class="container-fluid " style="background-image:url(photo/slider_1.jpg); margin-top: -8%;">
        <div class="row" id="servHeader">
        <div class="col-md-3">
            </div>
            <h3> SHERBIMET</h3>

        </div>
    </div>

    <div class="container-fluid ">
        <!-- Rreshti i 3 -->

        <div class="row">
            


            <div class="col-md-3" id="servisesbg" >
                <h3 style="color: #FFF"> Vila </h3>
                <hr/>
                <p style="color: #FFF"> 
                        <a href="contact.php" style="color: #f2f2f2 "><u>Lini takimin</u></a> tuaj me nje prej agjenteve tane per te marre nje sherbim te dedikuar 
                        per te kuptuar se cila prone i pershtatet nevojave dhe kerkesave te tua  </p>
                <a class="btn" style="color: #fff; border: 2px solid #fff; padding: 3%; margin-top:10px; border-radius: 8px;" href="vila.php"> View more... </a>
            </div>
            <?php
                $prona = "SELECT `prona_id`, `hapsira`, `titulli`, `pershkrimi`, `content_img`, `ngjarja` FROM `prona`, `ngjarje` WHERE `ngjarje`.`ngjarje_id` = `prona`.`ngjarje_id` AND `prona`.`lloji_id` = (SELECT lloji_prones_id FROM lloji_prones WHERE `lloji_prones`.`lloji` = 'Vila') ORDER BY `register_date` DESC LIMIT 0,2";
                $result = mysqli_query($con, $prona);
                $resultcheck = mysqli_num_rows($result);

                if( $resultcheck > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo                     
                        '
                            <div class="col-sm-3" id="prodServ">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> <img src="'.$row['content_img'].'" width="300px" height="220ppx"><br />
                                            <h4 style="color: #FFA800">  '.$row['titulli'].'</h4>
                                            <h6> Ngjarja: '.$row['ngjarja'].'</h6>
                                            <h6><small style="font-weight: 500;"> Hapsira: '.$row['hapsira'].'m<sup>2</sup></small></h6></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr />
                                <p> Pershkrimi: '.substr($row['pershkrimi'], 0, 60).'</p>
                                <button type="button"  class="btn btn-primary view_data" name="details"  id="'.$row['prona_id'].'"  > Lexo më shumë... '.$row['prona_id'].'</button>  

                            </div>  
                        
                        ' ;
                    }
                }         
            ?>

        </div>
        <!-- Rreshti i 3 -->

        <div class="row">

            <div class="col-md-3" id="servisesbg" >
                <h3 style="color: #FFF"> Apartamente </h3>
                <hr/>
                <p style="color: #FFF"> 
                        <a href="contact.php" style="color: #f2f2f2 "><u>Lini takimin</u></a> tuaj me nje prej agjenteve tane per te marre nje sherbim te dedikuar 
                        per te kuptuar se cila prone i pershtatet nevojave dhe kerkesave te tua  </p>
                <a class="btn" style="color: #fff; border: 2px solid #fff; padding: 3%; margin-top:10px; border-radius: 8px;" href="apartamente.php"> View more... </a>
            </div>
            <?php
                $prona = "SELECT `prona_id`, `hapsira`, `titulli`, `pershkrimi`, `content_img`, `ngjarja` FROM `prona`, `ngjarje` WHERE `ngjarje`.`ngjarje_id` = `prona`.`ngjarje_id` AND `prona`.`lloji_id` = (SELECT lloji_prones_id FROM lloji_prones WHERE `lloji_prones`.`lloji` = 'Apartament') ORDER BY `register_date` DESC LIMIT 0,2";
                $result = mysqli_query($con, $prona);
                $resultcheck = mysqli_num_rows($result);

                if( $resultcheck > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo                     
                        '
                            <div class="col-sm-3" id="prodServ">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> <img src="'.$row['content_img'].'" width="300px" height="220ppx"><br />
                                            <h4 style="color: #FFA800">  '.$row['titulli'].'</h4>
                                            <h6> Ngjarja: '.$row['ngjarja'].'</h6>
                                            <h6><small style="font-weight: 500;"> Hapsira: '.$row['hapsira'].'m<sup>2</sup></small></h6></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr />
                                <p> Pershkrimi: '.substr($row['pershkrimi'], 0, 60).'</p>
                                <button type="button"  class="btn btn-primary view_data" name="details"  id="'.$row['prona_id'].'"  > Lexo më shumë... '.$row['prona_id'].'</button>  

                            </div>  
                        
                        ' ;
                    }
                }         
            ?>

        </div>
<!-- Rreshti i 3 -->
        <div class="row">
            <div class="col-md-3" id="servisesbg" >
                <h3 style="color: #FFF"> Ambiente Biznesi </h3>
                <hr/>
                <p style="color: #FFF"> 
                        <a href="contact.php" style="color: #f2f2f2 "><u>Lini takimin</u></a> tuaj me nje prej agjenteve tane per te marre nje sherbim te dedikuar 
                        per te kuptuar se cila prone i pershtatet nevojave dhe kerkesave te tua  </p>
                <a class="btn" style="color: #fff; border: 2px solid #fff; padding: 3%; margin-top:10px; border-radius: 8px;" href="ambiznesi.php"> View more... </a>
            </div>
            <?php
                $prona = "SELECT`prona_id`,  `hapsira`, `titulli`, `pershkrimi`, `content_img`, `ngjarja` FROM `prona`, `ngjarje` WHERE `ngjarje`.`ngjarje_id` = `prona`.`ngjarje_id` AND `prona`.`lloji_id` = (SELECT lloji_prones_id FROM lloji_prones WHERE `lloji_prones`.`lloji` = 'Ambient Biznesi') ORDER BY `register_date` DESC LIMIT 0,2";
                $result = mysqli_query($con, $prona);
                $resultcheck = mysqli_num_rows($result);

                if( $resultcheck > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo                     
                        '
                            <div class="col-sm-3" id="prodServ">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> <img src="'.$row['content_img'].'" width="300px" height="220ppx"><br />
                                            <h4 style="color: #FFA800">  '.$row['titulli'].'</h4>
                                            <h6> Ngjarja: '.$row['ngjarja'].'</h6>
                                            <h6><small style="font-weight: 500;"> Hapsira: '.$row['hapsira'].'m<sup>2</sup></small></h6></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr />
                                <p> Pershkrimi: '.substr($row['pershkrimi'], 0, 60).'</p>
                                <button type="button"  class="btn btn-primary view_data" name="details"  id="'.$row['prona_id'].'"  > Lexo më shumë... '.$row['prona_id'].'</button>  
                            </div>  
                        
                        ' ;
                    }
                }         
            ?>

        </div>
        <!-- fund -->
    </div>

    <div class="modal " id="more" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    
    </div>
</main>
<?php 
include 'footer.php';

?>

<script>
$(document).ready(() => {
    setTimeout(() => {
        $(".alert").remove();
    }, 3000);

        $('.view_data').on('click', function() {
            var prona_id = $('.view_data').attr("id");

            $.ajax({
                url:"prona_data.php",
                type:"post",
                data: {prona_id:prona_id},
                success:function(data){
                    $("#more").html( data );
                    $("#more").modal("show");
                }

            });

        });

    });
</script>