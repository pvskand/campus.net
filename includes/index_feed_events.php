<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iitk";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$today_date = date("Y-m-d");
$curr_time = date("H:i:s");



$sql ="SELECT * FROM event WHERE DATE(end_time) >= $today_date";
$result = mysqli_query($conn , $sql);

$data = array();	
$count = 0;
if(mysqli_num_rows($result)) {
	while($row = mysqli_fetch_assoc($result)) {
		$data[$count]["id"] = $row["id"]; 
		$data[$count]["name"] = $row["name"];
		$data[$count]["organiser"] = $row["organiser"]; 
		$data[$count]["venue"] = $row["venue"];
		$data[$count]["link"] = $row["link"];
		$data[$count]["begin_time"] = $row["begin_time"];
		$data[$count]["end_time"] = $row["end_time"];


		$count += 1;
	}
}




echo json_encode($data);



?>