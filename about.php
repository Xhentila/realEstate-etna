<?php 
    include('header.php') ;
    include('shared/navbar.php') ;
    require('database/db_connection.php');
?>



<main>

    <div class="container-fluid  " >
        <div class="row " id="aboutHeader">
            <div class="col-md-3" >
            </div>
            <div class="col-md-8" >

                <h3 id="searchtext"> ETNA-3  </h3>
                <p style="text-align: right;  padding: 0 5% 5% 5%; color:#5a6e73;">Platform Imobiliare</p>
            </div>
        </div>
    </div>
    <!--        RReshti i pare i faqes-->

    <div class="container-fluid"  >
        <div class="row">
            <div class="col-md-1" ></div>

            <div class="col-md-5" >
                <h2 style="padding-top: 10%; padding-bottom: 10% ;color: #0190b9; font-weight: 500!important; font-size: 55px; letter-spacing:5px">KUSH JEMI? </h2>
                <h6 style="padding-bottom: 2% ; font-weight: 100!important; font-size:19px; letter-spacing:2px"> Platforma me e re dhe me dinamike qe i dedikohet te gjithe agjenteve imobiliar.</h6>
                <p> Qellimi yne kryesor eshte te krijojme lehtesi ne blerjen, shitjen apo marrjen me qera te nje ambienti.
                    <br />Tani eshte me e lehte per te komunikuar me klientet tuaj por gjitashtu me e lehte nga ana e klienteve te gjejne agjentin <br />
                    me te besuesshemn.    </p>  
                    <p>Me ane te ETNA-3 ju keni mundesine te kerkoni midis pronave te ndryshme te prezantuara dhe te perzgjedhur nga agjentet tane.
                    <br/> Duam tju ofrojme me te miren dhe me te pershtatshmen per ju! </p>
            </div>
            <div class="col-md-5" id="ne">
                <img src="photo/house-png.png"  width="500px" style="margin-top: -15%"/>

            </div>
        </div>
    </div>


<div class="container-fluid" style="margin-top:70px" >
    <div class="row"  id="xhni" >

        <div class="col-md-1" >  </div>
        <div class="col-md-3" id="prona_about">
            <div id="img_container">
                <img src="photo/about_vila.png"  width="300px" height="200px" /></div>
            <h4 style="color: #FFA800"> VILA</h4>
            
            <hr />
            <p>Tek platforma ju jepet udesia te gjeni vilen ne te cilen deshironi te kaloni pushimet tuaja te paharrueshme<br /> 
                           </p>
        
        </div>
        <div class="col-md-3" id="prona_about">
            <div id="img_container">
                <img src="photo/about_apartment.png"  width="300px" height="200px" /></div>
            <h4 style="color: #FFA800"> APARTAMENTE</h4>
            
            <hr />
            <p>Tek platforma ju jepet udesia te gjeni vilen ne te cilen deshironi te kaloni pushimet tuaja te paharrueshme <br /> 
                           </p>
        
        </div>
        <div class="col-md-3" id="prona_about" >
            <div id="img_container">
                <img src="photo/about_vila.png"  width="300px" height="200px" /></div>
            <h4 style="color: #FFA800"> AMBIENTE BIZNESI</h4>
            
            <hr />
            <p>Tek platforma ju jepet udesia te gjeni vilen ne te cilen deshironi te kaloni pushimet tuaja te paharrueshme <br /> 
                            </p>
        
        </div>


        

    </div>

</div>

        <div class="container-fluid" style="margin-top:70px" >


            <div class="row">
                <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <!-- Kerkoni agjentin sipas qytetit qe jane regjistruar -->
                        <form action="agent/searchagent.php" method="POST">
                            <div class="form-group">
                                <select  name="qyteti" id="select-about" style="width:60%">
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
                                <input type="submit" id="submit-about" class="btn btn-info" name="search_agent" value="Gjeni Agjentin Tuaj" >
                            </div>
                        </form>
                    </div>
                <div class="col-md-4"></div>
            </div>   
        </div>    

</main>

<?php include_once 'footer.php'; ?>