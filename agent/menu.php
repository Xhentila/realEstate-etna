

<?php 
if(isset($_SESSION['nipt']))
{
    
    ?>
    <div class="container-fluid center" >
        <div class="row" id="admHeader">
            <?php
                if($_SESSION['nipt']){
                    echo '<div class="col-md-9"><h2  style="float: left"> Mire se erdhet, agjenti me NIPT = '.$_SESSION['nipt'].'</h2></div>
                  <div class="col-md-3"><h2><a style="color:#fff; float: right" href="../agent/logout.php" class="" > Logout </a></h2></div>  
                    '
                    
                    ;
                }
            ?>
    </div>
        <div class="row">
            <div class="col-md-2 sidebar-menu">
                <ul class="" style="list-style-type:none; ">

                        <li><a class="btn btn-info" href="../index.php">Home</a></li>
                        <li><a class="btn btn-info" href="../agent/dashboard.php">Dashboard</a></li>
                        <li><a class="btn btn-info" href="../agent/add_prona.php">Shto Prona</a></li>
                        <li><a class="btn btn-info" href="../agent/personal_data.php">Profili</a></li>
                        

                    

                </ul>
            </div>
            <div class="col-md-9  ">
               
        
           
<?php }else{?>

    <div class="container row"><p><i>You are Not allowed to access this page! </i></p><a  href="../index.php"> here </a></div> 
<?php
}

?>