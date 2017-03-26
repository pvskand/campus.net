<?php


require_once('../includes/connect.php');


$user_id = 1;

$course = (string)$_POST['select'];
$class_status = $_POST['radio'];

echo $course, " ", $class_status; 



if($class_status == 1) // present
	{
		$sql ="UPDATE user_courses SET present = present + 1, total = total + 1 WHERE user_id = 1 AND courses = '$course'";
		$result = mysqli_query($conn , $sql);



	}

else if($class_status == 0)	// absent
	{
		
		$sql ="UPDATE user_courses SET total = total + 1 WHERE user_id = 1 AND courses = '$course'";
		$result = mysqli_query($conn , $sql);
	}

header("Location: more.php");
exit();








?>