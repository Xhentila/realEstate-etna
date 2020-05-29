

<?php 
if(isset($_SESSION['role_id']))
{
    $role_id = $_SESSION['role_id'];
    
    ?>
    <div class="container-fluid center" >
        <div class="row" id="admHeader">
            <?php
                if($_SESSION['name']){
                    echo '<div class="col-md-9"><h2  style="float: left" >Welcome Back, '.$_SESSION['name'].' </h2></div>
                  <div class="col-md-3"><h2><a style="color:#fff; float: right" href="../admin/logout.php" class="" > Logout </a></h2></div>  
                    '
                    
                    ;
                }
            ?>
    </div>
        <div class="row">
            <div class="col-md-2 sidebar-menu">
                <ul class="" style="list-style-type:none; ">

               <?php if($role_id == 1){
                   echo '
                        <li><a class="btn btn-info" href="../admin/adminmainpage.php">Dashboard</a></li>
                        <li><a class="btn btn-info" href="../admin/addproperties.php">Shto Prona</a></li>
                        <li><a class="btn btn-info" href="../admin/addpropertytype.php">Shto Llojin</a></li>
                        <li><a class="btn btn-info" href="../admin/addcity.php">Shto Qytet</a></li>
                        <li><a class="btn btn-info" href="../admin/addevent.php">Shto Ngjarje</a></li>
                        <li><a class="btn btn-info" href="../admin/addnewadmin.php">Admin i Ri</a></li>
                        ';
               
                    }else{
                        echo '
                            <li><a class="btn btn-info" href="../admin/agentmainpage.php">Dashboard</a></li>
                            <li><a class="btn btn-info" href="../admin/addproperties.php">Shto Prona</a></li>
                        ';
                        }
               
               ?>
                    

                </ul>
            </div>
            <div class="col-md-9  ">
               
        
           
<?php }else{?>

    <div class="container row"><p><i>You are Not allowed to access this page! </i></p><a  href="../index.php"> here </a></div> 
<?php
}

?>