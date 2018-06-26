<?php
    require "./connect.php";
    session_start();
    if($_SESSION['u_id'] == "")
    { 
      echo '<script>window.location.href = "index.php";</script>';  
    }
    $id = $_SESSION['u_id'];
    $name = $_GET['u_name'];
    $lastname = $_GET['u_lastname'];
    $email = $_GET['u_username'];
    $error = NULL;
    if (empty($name)) {
        $error = 'Error!';
       echo '<script>
        location.href = "index.php";
        </script>';
    }
    if (empty($lastname)) {
        $error = 'Error!';
       echo '<script>
        location.href = "index.php";
        </script>';
    }
    if (empty($email)) {
        $error = 'Error!';
       echo '<script>
        location.href = "index.php";
        </script>';
    }
    if(!$error){
        $query = "UPDATE `db_users` SET `u_name` = '$name',`u_lastname` = '$email' WHERE `db_users`.`u_id` = $id";
    mysqli_query($con, $query);
    header ("Location: index.php");
    }
?>
