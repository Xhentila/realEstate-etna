
<?php 
    session_start();

    require_once '../database/db_connection.php';
    
    if(isset($_POST['login-submit']))
    {
        $name_admin = $_POST['name'] ;
        $passw_admin = $_POST['passw'];
        $role = $_POST['roli'];
        $encrypt_password = md5($passw_admin."$$$$$$");
        
        $_SESSION['name']= $name_admin;

        $sql = " SELECT * FROM `admin` INNER JOIN `role` ON `admin`.`role_id` = `role`.`id` 
                WHERE `name` = '$name_admin' AND `password` = '$encrypt_password'
                AND `admin`.`role_id` = $role              
                ";

        $query = mysqli_query($con, $sql);
        $row = mysqli_num_rows($query); //the row with the user's data 
        

            if($row == 1 ){

                if($role != 1 ){

                    while($admin_id = mysqli_fetch_array($query)){
                        $_SESSION['admin_id']= $admin_id['admin_id'];
                    
                    $_SESSION['name']= $name_admin;
                    $_SESSION['role_id']= $role;

                    }
                    header('Location: agentmainpage.php/ag='.$_SESSION['admin_id']); 


                }else{

                    while($admin_id = mysqli_fetch_array($query)){
                        $_SESSION['admin_id']= $admin_id['admin_id'];
                        
                    $_SESSION['name']= $name_admin;
                    $_SESSION['role_id']= $role;
                    }
                    header('Location: adminmainpage.php?adm='.$_SESSION['admin_id']); 
                }

            }else{

                header('Location: index.php?error=checkcredencials');
            }       
        
    }

?>