<?php 
    session_start();
    include('../header.php'); 
    require '../database/db_connection.php';

    if(isset($_SESSION['name']))
    { 
?>
<style>
    <?php include('../admin/admin.css')?>
</style>

<main>
    <?php require_once '../admin/adm_menu.php'; ?>
    
                <table  >
                    <tbody>
                    <form action="deleteedit.php" method="POST">

                            <tr>
                                <th>TITULLI </th>
                                <th>HAPSIRA </th>
                                <th> PERSHKRIMI</th>
                                <th> Edito</th>
                                <th> Fshi</th>
                            </tr>
                            <?php
                                $pronas = 'SELECT * FROM `prona` ORDER BY `register_date` DESC LIMIT 0,5';
                                $result = mysqli_query($con, $pronas);
                                $resultcheck = mysqli_num_rows($result);

                                if( $resultcheck > 0)
                                {
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo                     
                                        '                            
                                            <tr>
                                                <td><h6 style="color: #000">  '.$row['titulli'].'</h6></td>
                                                <td><h6>'.$row['hapsira'].'</h6></td>
                                                <td><p>'.$row['pershkrimi'].'</p></td>
                                                <td> <button type="submit" name="edit" value="" class="btn btn-warning" > Edit </button></td>
                                                <td> <button type="submit" name="delete" value="'.$row['prona_id'].'" class="btn btn-warning" > Delete </button></td>
                                            </tr>        
                                        ';
                                    }
                                }         

                            ?>
                    </tbody>
                </table>
                </form>

            </div>
        </div>
    </div>
</main>
<?php }else{?>

    <div class="container row"><p><i>You are Not allowed to access this page! </i></p><a  href="../index.php"> here </a></div> 
<?php
}

?>