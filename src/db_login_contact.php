<?php
  session_start();
    require "./connect.php";
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $res_check = mysqli_query($con,"SELECT * FROM `db_users` where db_users.u_username = '$user' and db_users.u_password = '$pass'");
    $result = mysqli_fetch_array($res_check);
    if (!$result)  {
       header( "location: login.php" );
    }else 
    {
      $_SESSION['u_id'] = $result['u_id'];
      $_SESSION['name'] = $result['u_name'];
      $_SESSION['status'] = $result['u_status'];
      session_write_close();
      if($result['u_status']=="admin")
      {
      header( "location: contact.php" );
      }
      else
      {
        header( "location: contact.php" );
      }
    }
    mysql_close();
?>
