

<?php 
    session_start();
    include('../header.php'); 
    require '../database/db_connection.php';

    if(isset($_SESSION['nipt']))
    { 
?>
<style>
    <?php include('../admin/admin.css')?>
</style>

<main>
    <?php require_once 'menu.php'; ?>

                <div class="container"  >
                    <div class="row">
                    <!-- <form action="delete_prona.php" method="POST"> -->

                                <div class="col-md-3" >TITULLI </div>
                                <div  class="col-md-2">HAPSIRA </div>
                                <div  class="col-md-3"> PERSHKRIMI</div>
                                <div class="col-md-3"> </div>
                     </div>      

                     

                            <?php

                                $agent_nipt = $_SESSION['nipt'];
                                $agent = "SELECT * FROM `prona` INNER JOIN `agents` ON `prona`.`agent_id` = `agents`.`id` 
                                            WHERE `prona`.`agent_id` = 
                                            (
                                                SELECT `id` FROM  `agents` WHERE `agents`.`nipt` = $agent_nipt
                                            ) 
                                            -- ORDER BY `register_date` DESC LIMIT 0,25
                                             ";

                                $result = mysqli_query($con, $agent);
                                $resultcheck = mysqli_num_rows($result);

                                if( $resultcheck > 0)
                                {
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo                     
                                        '   <div class="row">                 
                                                <div class="col-md-3"><h6 style="color: #000">  '.$row['titulli'].'</h6></div>
                                                <div class="col-md-2"><h6>'.$row['hapsira'].'</h6></div>
                                                <div class="col-md-3"><p>'.substr($row['pershkrimi'], 0, 60).'</p></div>
                                                <div class="col-md-2"> 
                                                    <form action="edit_prona.php" method="post">                
                                                        <input type="hidden" value="'.$row['prona_id'].'" name="editrow" />
                                                        <input type="hidden" value="'.$agent_nipt.'" name="session" />
                                                        <button type="submit" name="edit" id="'.$row['prona_id'].'"  class="btn btn-warning edit_data"> Edit </button> 
                                                    </form>
                                                </div>
                                                <div class="col-md-2"> 
                                                    <form action="delete_prona.php" method="post">
                                                        <input type="hidden" value="'.$row['prona_id'].'" name="deleterow" />
                                                        <button type="submit" name="delete" id="'.$row['prona_id'].'"  class="btn btn-warning delete_data"> Detele </button> 
                                                    </form>
                                                </div>
                                            </div>

                                        ';
                                    }
                                }         

                            ?>
                    </div>
                <!-- </form>  -->
            
                </div>
            </div>
        </div>

    
                <div class="row" id="prona_details">
                    
                </div>
                
</main>
<?php }else{

        echo '<div class="container row"><p><i>You are Not allowed to access this page! </i></p><a  href="../index.php"> here </a></div> ';
}

//  <td> <button type="submit" name="delete" id="'.$row['prona_id'].'" class="btn btn-warning delete_data"> Delete </button></td>

?>
<script>
    $($document).ready(()=>{
        $('.edit_data').click(()=>{
            var id = $(this).attr("id");

            $.ajax({
                url:"./edit_prona.php.php",
                type:"POST",
                data: {id:id},
                // success:function(data){
                //     $("#prona_details").html( "hello " );
                // }

            });

        });
    });

    $($document).ready(()=>{
        $('.delete_data').click(()=>{
            var pronaId = $(this).attr("id");

            $.ajax({
                url:"./delete_prona.php",
                type:"POST",
                data: {pronaId:pronaId},
                success:function(data){
                    alert(data);
                }

            });

        });
    });

</script>