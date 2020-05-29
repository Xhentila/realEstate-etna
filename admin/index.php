
<?php 
    include('../header.php'); 
    require '../database/db_connection.php';
?>

<style>
    <?php include('../admin/admin.css'); ?>
</style>

<main id="adm-bg">
    <div class="container center-div shadow p-2" >
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center text-uppercase"> Admin Login</h2>
                <hr />
                <form action="logincheck.php" method="POST" class=" shadow p-2 ">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Admin">
                        <input type="password" name="passw" placeholder="Password">
                    
                        <select name="roli" id="selectForm" required>
                            <?php 
                                $query = "SELECT * FROM `role` ";
                                $result_role = mysqli_query($con, $query);
                                if($result_role )
                                {
                                    while($row = mysqli_fetch_array($result_role))
                                    {
                                        
                                            echo '<option value="'.$row['id'].'">'.$row["role"].'</option>';
                                    
                                    }
                                }
                            ?>    
                        </select>
                
                        <input type="submit" class="btn btn-success" value="Login" name="login-submit">
                    </div>
                </form>
            </div>

        </div>
        <div class="col-md-3">
        </div>
    </div>
</main>