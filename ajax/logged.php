<?php
	
	// Create connection
	require_once('../includes/connect.php');

	// Check connection
 	
 	//$method = json_decode($_POST);
	$email = $_POST['logemail'];
	$pass = $_POST['logpass'];
	
	//$method["ho"] = "nahi";
	//echo $name.$pass;	


	$flag=0;
	$sql = "SELECT * FROM userdet WHERE Email = '$email'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($pass , $row['Password'])) {
			// output data of each row
			//echo "Welcome ".ucFirst($row['Name']).'<br>';
			$flag=1;
			$_SESSION['user']['email'] = $email;
			$_SESSION['user']['pass'] = $pass;
			$_SESSION['user']['name'] = $row['Name'];
			$_SESSION['LAST_ACTIVITY'] = time();
			$ami = true;
		}			
	}
	if($flag !=1) {
		$ami = false;
		//echo 'Wrong Entry';
	}
	echo json_encode($ami);		
?>
