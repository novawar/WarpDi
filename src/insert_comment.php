<?php
    require "./connect.php";
    session_start();
    $CHECK_SESSION = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';
    if($CHECK_SESSION == "")
    { 
      echo '<script>window.location.href = "warp.php";</script>';  
    }
    $comment_id = $_POST["comment_id"];
    $topic_id = $_POST["topic_id"];
    $create_date = date("Y-m-d H:i:s");  
    $info = $_POST["info"];
    $name = $_SESSION['name'];
    $author_id = $_SESSION['u_id'];
    $error = NULL;
    if (empty($info)) {
        $error = 'Error!';
        header ("Location: warp-view.php?request=$topic_id");
    }
    if(!$error){
  
        $res = mysqli_query($con,"INSERT  INTO `comment`(`topic_id`, `create_date`, `info`, `name`,`author_id`) VALUES ('$topic_id','$create_date','$info','$name','$author_id')");
        if ($res) {      
            header ("Location: warp-view.php?request=$topic_id");
    
        }
    }
?>
