<?php
require_once("../includes/connect.php");

if(!empty($_POST["keyword"])) {	
	$sql ="SELECT * FROM instructor WHERE name LIKE '%" . $_POST["keyword"] . "%' ORDER BY name LIMIT 5";
	$result = mysqli_query($conn , $sql);	
	$data = array();	
	$count = 0;
	if(mysqli_num_rows($result)) {
		while($row = mysqli_fetch_assoc($result)) {
			$data[$count]["id"] = $row["id"]; 
			$data[$count]["name"] = $row["name"]; 
			// $data[$count]["desig"] = $row["desig"]; 
			$count += 1;
    	}
	}
	echo json_encode($data);
}
?>