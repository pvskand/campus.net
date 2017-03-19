<?php
	require_once("connect.php");
	if($conn){
		$sql = "SELECT * FROM event";
		$res = mysqli_query($conn,$sql);
		if($res){
			$i = 0;
			while($row=$res->fetch_assoc()){
				$P->name = $row["name"];
				$i++;
			}
			$myJSON = json_encode($P);
			echo $myJSON;
		}
		else{
			trigger_error('Invalid query: ' . $res->error);
		}
	}
	else{
		trigger_error('Invalid query: ' . $conn->error);
	}

?>