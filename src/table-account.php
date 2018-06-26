<?php
    require "./connect.php";
	
    $selectQuery = "SELECT u_id, u_name, u_lastname ,u_username,u_status FROM db_users;";
    $myArray = array();
	if ($res = mysqli_query($con,$selectQuery)) {
		while($row = mysqli_fetch_array($res)) {
			$myArray[] = $row;
		}
		echo json_encode($myArray);
	}
?>



