<?php
require_once("../includes/connect.php");

if(!empty($_POST["keyword"])) {	
	$sql ="SELECT * FROM courses WHERE title LIKE '%" . $_POST["keyword"] . "%' ORDER BY title LIMIT 5";
	$result = mysqli_query($conn , $sql);	
	$data = array();	
	$count = 0;
	if(mysqli_num_rows($result)) {
		while($row = mysqli_fetch_assoc($result)) {
			$data[$count]["id"] = $row["id"]; 
			$data[$count]["code"] = $row["code"]; 
			$data[$count]["title"] = $row["title"]; 
			$count += 1;
    	}
	}
	echo json_encode($data);
}
?>