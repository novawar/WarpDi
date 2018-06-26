<?php
    require "./connect.php";
    $selectQuery = "SELECT topic_id, topic, detail,warp ,category,author_id FROM content;";
    $myArray = array();
	if ($res = mysqli_query($con,$selectQuery)) {
		while($row = mysqli_fetch_array($res)) {
			$myArray[] = $row;
		}
		echo json_encode($myArray);
	}
?>



