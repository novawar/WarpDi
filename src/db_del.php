<?php
    require "./connect.php";
    $data = $_POST['topic_id'];
    $del ="DELETE FROM `comment` WHERE `topic_id` LIKE '$data'";
    $del2= "DELETE FROM `content` WHERE `content`.`topic_id` = '$data'";
     
    $query = mysqli_query($con,$del2);
    $query = mysqli_query($con,$del);
    if ($query) {
      echo '<script>window.location.href = "warp.php";</script>';  
    }else {
      echo '<script>window.location.href = "warp.php";</script>';  
    }

    
?>
