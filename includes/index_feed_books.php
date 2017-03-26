<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iitk";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



$sql ="SELECT * FROM books";
$result = mysqli_query($conn , $sql);

$data = array();	
$count = 0;
if(mysqli_num_rows($result)) {
	while($row = mysqli_fetch_assoc($result)) {
		$data[$count]["id"] = $row["id"]; 
		$data[$count]["name"] = $row["name"];
		$data[$count]["author"] = $row["author"]; 
		$data[$count]["due_date"] = $row["due_date"];

		$count += 1;
	}
}




echo json_encode($data);



?>