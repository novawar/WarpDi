<?php
    require "./connect.php";
    $data = $_POST['topic_id'];
    $del ="DELETE FROM `comment` WHERE `comment`.`comment_id` LIKE '$data'";
    $query = mysqli_query($con,$del);
    if ($query) {
      echo '<script>window.location.href = "warp.php";</script>';  
    }else {
      echo '<script>window.location.href = "warp.php";</script>';  
    }
?>
