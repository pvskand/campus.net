<?php
	require_once("connect.php");
	if($conn){
		$sql = "SELECT * FROM event";
		$res = mysqli_query($conn,$sql);
		if($res){
			$i = 0;
			$P = new StdClass;
			while($row=$res->fetch_assoc()){
				$P->name = $row["name"];
				$P->organiser = $row["organiser"];
				$P->venue = $row["venue"];
				$P->link = $row["link"];
				$P->begin_time = $row["begin_time"];
				$P->end_time = $row["end_time"];
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