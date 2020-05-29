<!-- Menu e navigimit e ndertuar me ane te klasave(grupime kodi per 1 element specifik per ti dhene disa cilesi te vecanta)
                te bootstrap. Keto klasa sic i shihni dhe me poshte jane -->

                
<?php session_start()?>
<div class="navbar my-nav sticky-top navbar-expand-sm navbar-light  justify-content-end " >
    <a class="navbar-brand" href="index.php"><img src="./logo.png" width="100px" height="70px"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse " id="navmenu">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active" >
                <a class="nav-link" style="color: #fff;" href="./index.php">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #fff;" href="./about.php">RRETH NESH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #fff;" href="./services.php">SHËRBIMET</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #fff;" href="./contact.php">KONTAKTONI</a>
            </li>
            <?php if(isset($_SESSION['nipt'])){?>
                
                <li><a class=" nav-link " style="color: #fff;" href="agent/dashboard.php">DASHBOARD</a></li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #fff;" href="agent/logout.php">LOG OUT</a>
                </li>
            <?php }?>           

            
        </ul>

        <!-- Button trigger modal -->
        
        <!-- KJO ESHTE FORM SEARCH, DO TE DUEHT ET LIDHET ME DATABASE ME PAS KUR TA KRIJOME -->
        <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</div>
