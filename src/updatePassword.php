<?php
    require "./connect.php";
    session_start();
    if($_SESSION['u_id'] == "")
    { 
      echo '<script>window.location.href = "index.php";</script>';  
    }
    $id = $_SESSION['u_id'];
    $password = md5($_GET['u_password']);
    $error = NULL;
    if (empty($password)) {
        $error = 'Error!';
       echo '<script>
        location.href = "index.php";
        </script>';
    }
    if(!$error){
        $query = "UPDATE `db_users` SET `u_password` = '$password' WHERE `db_users`.`u_id` = $id";
    mysqli_query($con, $query);
    header ("Location: index.php");
    }
?>
