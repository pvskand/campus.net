<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iitk";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$dates = array("", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
$today = date('l');
$today_ind = array_search($today, $dates);


$sql1 ="SELECT * FROM breakfast WHERE day = $today_ind";

$result1 = mysqli_query($conn , $sql1);
$count1 = 0;
if(mysqli_num_rows($result1)) {
	while($row = mysqli_fetch_assoc($result1)) {

		$data[$count1]["item1"] = $row["item1"]; 
		$data[$count1]["item2"] = $row["item2"]; 
		$data[$count1]["item3"] = $row["item3"]; 
		$data[$count1]["item4"] = $row["item4"]; 
		$count1 += 1;
	}
}

$sql1 ="SELECT * FROM lunch WHERE day = $today_ind";

$result1 = mysqli_query($conn , $sql1);

if(mysqli_num_rows($result1)) {
	while($row = mysqli_fetch_assoc($result1)) {

		$data[$count1]["item1"] = $row["item1"]; 
		$data[$count1]["item2"] = $row["item2"]; 
		$data[$count1]["item3"] = $row["item3"]; 
		$data[$count1]["item4"] = $row["item4"]; 
		$count1 += 1;
	}
}


$sql1 ="SELECT * FROM dinner WHERE day = $today_ind";

$result1 = mysqli_query($conn , $sql1);

if(mysqli_num_rows($result1)) {
	while($row = mysqli_fetch_assoc($result1)) {

		$data[$count1]["item1"] = $row["item1"]; 
		$data[$count1]["item2"] = $row["item2"]; 
		$data[$count1]["item3"] = $row["item3"]; 
		$data[$count1]["item4"] = $row["item4"]; 
		$count1 += 1;
	}
}




echo json_encode($data);



?>