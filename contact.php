<?php 
    include('header.php');
    include('shared/navbar.php');
    require('database/db_connection.php');
?>



<main>

<div class="container-fluid " style="background-image:url(photo/slider_1.jpg); margin-top: -8%;">
        <div class="row parallax" id="cntHeader">
        <div class="col-md-3">
            </div>
            <h3> Kontaktoni per me shume informacione dhe detaje </h3>

        </div>
    </div>

    <!-- -->
    <div class="container" id="boxi">
        <div class="row" id="row">
            
            <div class="col-md-6" id="kutia1">
                <h1 > Na kontaktoni</h1>
                <form action="email.php" method="post">
                    <div class="form-group">
                        <input type="text" id="emriplote" name="emriplote" placeholder="Emri Juaj..">
                    </div>
                    <div class="form-group"> <!-- po TE SHTOJ EDHE KETE KJO TE NDIHMON NE DESIGN KONTROLLOJE ME TEJ  -->
                        <input type="text" id="email" name="email" placeholder="Email.." >
                    </div>
                    <div class="form-group">
                        <input type="number" id="phonenumber" name="phonenumber" placeholder="+355..." >
                        </div>
                    <div class="form-group">
                        <textarea id="mesazhi" name="comments" rows="5" cols="50" placeholder="Mesazhi juaj.."></textarea>
                    </div>
                        <input type="Submit" class="btn btn-info" name="submit" id="submit" value="Submit" >
                </form>
            </div>
            
    
<!--                     KONTROLLO MUNGON NDONJ DIV MBYLLES, E MORA UN KODIN KUR TE PERFUNDOSH EDHE SHERBIMET ME DERGONI KETE PO E PERFNDOJ UNE MOS U MERR ME ME KONTAKTET :) FILLO PUNONI ME 2 FAQET E SHERBIMEVE -->
            <div class="col-md-5" id="kutia2">
                <p>Po kerkoni per prona ne Shqiperi, plotesoni kutite ne anen tuaj dhe do te lidhen menjehere me nje nga agjentet tane on-line.</p>
                <p>Doni te shisni pronen tuaj? Na dergoni fotot dhe vendndodhjen tuaj. Ne ju dergojme menjehere agjentet tane imobiliare.</p>
                 <p><h4>Si mund te na kontaktoni?</h4>
                <b><h6>E-mail: <i class="fa fa-envelope" style="padding:0 1% 0 2%;"></i><a href="info@etna3.al">info@etna3.al </a></h6>
                <br><b><h6>Telefon:</h6></b>
                    <ul style="list-style-type: none;">
                        <li><i class="fa fa-phone" style="padding-right:1%;" ></i><a href="+355044333033">+355044333033</a></li>
                        <li><i class="fa fa-phone" style="padding-right:1%;"></i><a href="+355693300333">+355693300333</a></li>
                    </ul>
    
                    Na ndiqni dhe ne rrjetet sociale:
                    <h6 ><a href="#">  <i class="fa fa-facebook" ></i> </a> 
                    <a href="#"> <i class="fa fa-instagram" style="padding-left:3%;"></i>  </a> 
                    <a href="#"> <i class="fa fa-linkedin" style="padding-left:3%;"></i>  </a> </h6>
            </div>
        </div>
    </div>


        <!-- Kjo esht pjesa e hartes bashke me contact form       -->
        
        
    <div class="container-fluid">
        <div class="row" id="harta">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.7191997667983!2d19.81181201479513!3d41.33671900709882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1350310c9509fc57%3A0x7ee838417de5aa2f!2sBeder%20University%2C%20Kompleksi%20Usluga%2C%20Rruga%20Jordan%20Misja%2C%20Tiran%C3%AB%2C%20Albania!5e0!3m2!1sen!2s!4v1574185378994!5m2!1sen!2s" width="100%" height="200px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>


</main>

<?php include 'footer.php';
?>