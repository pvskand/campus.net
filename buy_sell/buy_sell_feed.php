<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iitk";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



$sql ="SELECT * FROM sell_table";
$result = mysqli_query($conn , $sql);

$data = array();	
$count = 0;
if(mysqli_num_rows($result)) {
	while($row = mysqli_fetch_assoc($result)) {
		$data[$count]["id"] = $row["id"]; 
		$data[$count]["name"] = $row["name"];
		$data[$count]["email"] = $row["email"]; 
		$data[$count]["item"] = $row["item"];
		$data[$count]["description"] = $row["description"]; 
		$data[$count]["cost"] = $row["cost"];
		$data[$count]["phone_number"] = $row["phone_number"];
		$count += 1;
	}
}

$sql1 ="SELECT * FROM sell_image";

$result1 = mysqli_query($conn , $sql1);
$count1 = 0;
if(mysqli_num_rows($result1)) {
	while($row = mysqli_fetch_assoc($result1)) {
		if($count1 == $count)
			break;

		$data[$count1]["image_name"] = $row["image_name"]; 
		$count1 += 1;
	}
}



echo json_encode($data);



?>