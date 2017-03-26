<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iitk";
// Create connection
$user_id = 1;
$conn = new mysqli($servername, $username, $password, $dbname);

$sql ="SELECT courses, present, total FROM user_courses WHERE user_id = 1";
$result = mysqli_query($conn , $sql);

$data = array();	
$count = 0;

if(mysqli_num_rows($result)) {

	while($row = mysqli_fetch_assoc($result)) {
		file_put_contents('file1.txt', 'hello world');
		$data[$count]["courses"] = $row["courses"]; 
		$data[$count]["present"] = $row["present"];
		$data[$count]["total"] = $row["total"]; 
		$count += 1;
	}
}




echo json_encode($data);



?>