<?php
    require "./connect.php";
    session_start();
    if($_SESSION['u_id'] == "")
    { 
      echo '<script>window.location.href = "post.php";</script>';  
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
        location.href = "post.php";
        </script>';
    }
    if (empty($detail)) {
        $error = 'Error!';
        echo '<script>
        location.href = "post.php";
        </script>';
    }
    if (empty($warp)) {
        $error = 'Error!';
        echo '<script>
        location.href = "post.php";
        </script>';
    }
    if (empty($category)) {
        $error = 'Error!';
        echo '<script>
        location.href = "post.php";
        </script>';
    }
    if(!$error){
    $query = "INSERT INTO `content` (`topic_id`, `topic`,`detail`,`warp`,`category`,`create_date` ,`author_id`) VALUES (NULL, '$topic','$detail','$warp','$category','$create_date','$author_id');";
    mysqli_query($con, $query);

    header ("Location: warp.php");
    }
?>
