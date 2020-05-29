<!-- Homepage -->
<?php 
    include('header.php') ;
    include('shared/navbar.php');
    include('shared/slider.php');
    require('database/db_connection.php');
?>

        
        <!-- About Us Home Info -->
        <div class="main_content container-fluid" style="background-image: url('./photo/home.png'); background-repeat: no-repeat;">
            
            <div class="row"  id="about_row"> 
                <div class="col-xs"></div>
                <div class="col-md-4" id="box_form">
                    <!-- Search result from the database -->

                    <form method="POST" action="searchresult.php" id="box-form">
                    <?php
                            if(isset($_SESSION['msg'])){?>
                            <div class="alert alert-warning">
                                <?= $_SESSION['msg'];?>
                            </div>
                        <?php }?>
                        <fieldset>
                            <span id="form_text"> </span>
                            <div class="form-group">
                                <select  name="qyteti">
                                    <?php
                                        $queryQ = "SELECT * FROM `qyteti`";
                                        $resultQ = mysqli_query($con, $queryQ);
                                        
                                        if($resultQ)
                                        {
                                            while($row = mysqli_fetch_array($resultQ))
                                            {                                                
                                                echo ' <option value="'.$row['qyteti_id'].'" >'.$row['qyteti'].'</option>';
                                            }
                                        }                                   
                                    ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <select  name="prona">
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
                            </div>
                            <div class="form-group">
                                <select  name="ngjarje">
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
                            </fieldset>            
                            <div class="form-group">
                                <input type="number" name="cmimi" id="hide_item" placeholder="Cmimi" > 
                            </div>
                            <div class="form-group">
                                <select name="hapesira">
                                        <option value="60">1+1</option>
                                        <option value="75">2+1</option>
                                        <option value="115">3+1</option>
                            
                                </select>

                            </div>

                            <!-- <div class="form-group">

                                <a id="hide_btn" class="btn btn-info" >Kerkim i Avancuar</a>
                            </div> -->
                            <div class="form-group">
                                <input type="submit" name="home-search"  class="btn btn-info" value="Gjeni Pronen" >                            
                            </div>

                        </form>
                        <div id="regjistrohu">
                            <table>
                                <tr>
                                    <td >
                                        <h6 class="center" style="padding-right: 30px"> A jeni agjent? </h6></td>
                                    <td>
                                        <button type="button" class="btn btn-info" style="width:100%"  data-toggle="modal" data-target="#login"> Login </button>
                                    </td>
                                </tr>
                            </table>
                        </div>

                           <!-- Login Modal -->
                           <div class="modal " id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="./agent/agentlogin.php" method="POST">
                                                <div class="form-group">
                                                    <input type="number" name="nipt"  placeholder="NIPT" /></div>
                                                
                                                <div class="form-group">
                                                    <input type="password" name="passw"  placeholder="Fjalekalim" /></div>
                                                <div class="form-group">
                                                    
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-info" name="login" value="Login" /></div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                                <h6 class="center">Punoni si agjent Imobiliar por nuk jeni regjistruar ende?</h6>
                                                 <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#register"> Register </button>

                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Register Modal -->
                            <div class="modal " id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">REGISTER NOW</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="./agent/register.php" method="POST">
                                                <div class="form-group" >
                                                    <input style="width:44%" type="text" name="emri" id="emri" placeholder="Emri" required/>
                                                    <input style="width:44%" type="text" name="mbiemri" id="mbiemri" placeholder="Mbiemri"required /></div>
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="email" required/></div>
                                                <div class="form-group">
                                                    <input type="password" name="passw" id="passw" placeholder="Fjalekalim" required/></div>
                                                <div class="form-group">
                                                    <input style="width:44%" type="number" name="mosha" min="25" id="mosha" placeholder="Mosha" required/>
                                                    <select style="width:44%" name="gjinia" >
                                                        <option value="">--Gjinia--</option>
                                                        <option value="F"> Femer</option>
                                                        <option value="M"> Mashkull</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input style="width:44%" type="number" name="telefon" id="telefon" placeholder="Telefon" required/>
                                                    <input style="width:44%" type="number" name="nipt" id="nipt" placeholder="NIPT" required /></div>
                                                <div class="form-group">
                                                    <input type="number" name="viteEksperience" min="1" id="viteEksperience" placeholder="Vite Eksperience" required />
                                                    <select  name="qytete" >
                                                        <?php
                                                            $queryQ = "SELECT * FROM `qyteti`";
                                                            $resultQ = mysqli_query($con, $queryQ);
                                                            
                                                            if($resultQ)
                                                            {
                                                                while($row = mysqli_fetch_array($resultQ))
                                                                {                                                
                                                                    echo ' <option value="'.$row['qyteti_id'].'" >'.$row['qyteti'].'</option>';
                                                                }
                                                            }                                   
                                                        ?> 
                                                    </select> 
                                                </div>
                                                <div class="form-group">
                                                    <input type="Submit" class="btn btn-info" name="register" value="Register" /></div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        
                </div>

                <div class="col-md-6" id="about_home">
                    <div id="info_x_ne">
                        <h3 class="bounceInLeft">Doni te lini takim me nje agjent? </h3>
                        <hr />
                        <h6>Ende nuk e keni vendosur cilin?</h6>
                        <p>Tani mund te zgjidhni mes tyre.<br />
                        </p>
                        <div>
                            <!-- Kerkoni agjentin sipas qytetit qe jane regjistruar -->
                            <form action="./agent/searchagent.php" method="POST">
                                <div class="form-group">
                                    <select  name="qyteti" style="width:50%">
                                        <?php
                                            $queryQ = "SELECT * FROM `qyteti`";
                                            $resultQ = mysqli_query($con, $queryQ);
                                            
                                            if($resultQ)
                                            {
                                                while($row = mysqli_fetch_array($resultQ))
                                                {                                                
                                                    echo ' <option value="'.$row['qyteti_id'].'" >'.$row['qyteti'].'</option>';
                                                }
                                            }                                   
                                        ?> 
                                    </select>                                   
                                    <input type="submit" class="btn btn-info" name="search_agent" value="Gjeni Agjentin Tuaj" >
                                </div>
                            </form>
                        </div>                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Ous Values -->
        <hr id="deviderHr" />
        <div class="container-fluid  row center" id="values">
            <div class="col-md-1"> </div>
            <div class="col-md-3">
                <div >
                    <img src="photo/icon_-.png">
                </div>
                <h4 class="center">Integritet</h4>
                <small>Ndershmeri dhe principe morale te larta</small>
            </div>
            <div class="col-md-3">
                <div >
                    <img src="photo/icon_-_.png">
                </div>
                <h4 class="center">Përkushtim</h4>
                <small>Ju pergjigjemi deri ne detaje kerkesave tuaja.</small>
            </div>
            <div class="col-md-3">
                <div >
                    <img src="photo/icon_.png">
                </div>
                <h4 class="center">Besueshmeri</h4>
                <small>Paraqesim zgjidhjet me te mira </small>
            </div>
            <div class="col-md-1"> </div>
        </div>

        <!--  -->

        <div class="container-fluid">
            <h3 class="container-fluid center" id="prod_header">PRONA TË PALUAJTSHME</h3>
        
                 <!-- Product item -->
            <div class="row" id="product_container">
        <?php 
    
            $prona = "SELECT * FROM `prona` INNER JOIN `ngjarje` ON `prona`.`ngjarje_id`= `ngjarje`.`ngjarje_id` 
                        INNER JOIN `agents` ON `prona`.`agent_id` = `agents`.`id` ORDER BY `prona_id` ASC LIMIT 0,3;

                            
                            ";
            $result = mysqli_query($con, $prona);
            $resultcheck = mysqli_num_rows($result);

            if( $resultcheck > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo                     
                    '
                        <div class="col-sm-3" id="prod_item">
                            <table>
                                <tbody>
                                    <tr>
                                        <td> <img src="'.$row['content_img'].'" width="300px" height="220ppx"><br />
                                        <h4 style="color: #7d5d36; text-transform: uppercase">  '.$row['titulli'].'</h4>
                                        <p><small style="font-weight: 500;">  Ngjarja: '.$row['ngjarja'].'</small><br />
                                            <small style="font-weight: 500;"> Cmimi: '.$row['cmimi'].' Leke</small> <br />
                                            <small style="font-weight: 500;"> Agent: '.$row['emri'].' '.$row['mbiemri'].'</small> <br />

                                        <small style="font-weight: 500;"> Hapsira: '.$row['hapsira'].'m<sup>2</sup></small></p></td>
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
        </div>

        <div class="modal " id="more" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detajet e Pronave</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="prona_details">
                               
                            </div>
                            <div class="modal-footer">
                                    

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>

        

        <!-- seksioni i footer -->
        <?php   include 'footer.php';
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
 