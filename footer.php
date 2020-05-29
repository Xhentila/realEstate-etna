
<?php 
    include('header.php');
?>
<div class="container-fluid" id="footer" >
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3" id="footercnt"> 
            <h5>SUBSCRIBE:<br />
            <hr width="70%" style="float:left; " /></h5>
            <br />
            <div>
                <form action="./agent/abonim.php" method="POST">
                    <div class="form-group">
                        <input style="width: 70%" type="email" name="email" id="email" placeholder="Abonohu - Email">
                        <input type="submit"  name="submit" value="Abonohu" >
                    </div>
                </form>
            </div>            
        </div>
        <div class="col-md-4" id="footercnt">
            <div class="" id="footertitle"> 
                <h5>CONTACT INFORMATION:<br />
                <hr style="float:left; " width="50%" /></h5>
            </div>
            <div class="" id="footertext"> 
                <br />
                <br />
                <div>E-mail: <a href="mailto:xhenidautaj2@gmail.com"> contact@etnaestate.al</a></div>
                <div>Tel: <a href="tel:00355 68 480 0428"> +355 82 620 357 </a></div>
                <div>Address: <a href="#">real_estate</a></div>
            </div>
        </div>
        <div class="col-md-4" id="footercnt">
            <div class="" id="footertitle"> 
                <h5> USEFUL LINKS: <br />
                <hr style="float:left; " width="50%" /></h5>
            </div>
            <div class="" id="footertext"> 
                <br />
                <br />
                <div><i class="fa fa-angle-right"></i> <a href="vila.php">Vila</a></div>
                <div><i class="fa fa-angle-right"></i> <a href="apartamente.php">Apartamente</a></div>
                <div><i class="fa fa-angle-right"></i> <a href="ambiznesi.php">Ambjente Biznesi</a></div>                
            </div>
        </div>
        <div class="col-md-1" id="footercnt">
        </div>
    </div>
    <div class="row">                
        <hr id="deviderHr" />
        <div class="col-md-12 center"> 
            <h6 class="center"> Copyright @ Etna-3 | All Rights Reserved. </h6>
            <a href="#navmenu" id="scrollTop"><i class="fa fa-angle-up" style="font-size:24px; background-color:#9daaad; padding:5px 10px"></i></a>
        </div>
    </div>
</div>

</body>
</html>

