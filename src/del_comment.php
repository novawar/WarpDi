<?php
    require "./connect.php";
    $data = $_POST['comment_id'];
    $del ="DELETE FROM `comment` WHERE `comment`.`comment_id` = '$data'";
    $query = mysqli_query($con,$del);
    if ($query) {
        header ("Location: warp-view.php?request=$topic_id");
    }else {
        header ("Location: warp-view.php?request=$topic_id");
    }
?>
