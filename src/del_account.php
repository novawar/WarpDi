<?php
session_start();
  if($_SESSION['u_id'] == "")
  { 
    echo '<script>window.location.href = "index.php";</script>';  
  }
  if($_SESSION['status'] != "admin")
  { 
    echo '<script>window.location.href = "index.php";</script>';  
  }
    require "./connect.php";
    $data = $_GET['u_id'];
    $del ="DELETE FROM `db_users` WHERE `u_id` = '$data'";
    $query = mysqli_query($con,$del);
    if ($query) {
      echo '<script>window.location.href = "account-stat.php";</script>';  
    }
    else{
      echo $_GET['u_id'];
    }

?>
