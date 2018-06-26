<?php
    require "./connect.php";
    session_start();
    if($_SESSION['u_id'] == "")
    { 
      echo '<script>window.location.href = "warp.php";</script>';  
    }

    $id = $_GET["topic_id"];
    $topic = $_GET["topic"];
    $detail = $_GET["detail"];
    $warp = $_GET["warp"];
    $category = $_GET["category"];
    $create_date = date("Y-m-d H:i:s");  
    $author_id = $_SESSION['u_id'];
    $error = NULL;
    if (empty($topic)) {
        $error = 'Error!';
       echo '<script>
        location.href = "edit-post.php";
        </script>';
    }
    if (empty($detail)) {
        $error = 'Error!';
        echo '<script>
        location.href = "edit-post.php";
        </script>';
    }
    if (empty($warp)) {
        $error = 'Error!';
        echo '<script>
        location.href = "edit-post.php";
        </script>';
    }
    if (empty($category)) {
        $error = 'Error!';
        echo '<script>
        location.href = "edit-post.php";
        </script>';
    }
    if(!$error){
        $query = "UPDATE `content` SET `topic` = '$topic',`detail` = '$detail',`warp` = '$warp',`category` = '$category', `create_date` = '$create_date', `author_id` = '$author_id' WHERE `content`.`topic_id` = $id";
    mysqli_query($con, $query);
    header ("Location: warp.php");
    }
?>
