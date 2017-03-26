<?php
	require_once("connect.php");
	if($conn){
		$sql = "SELECT * FROM event WHERE begin_time >= NOW() ORDER BY begin_time";
		$res = mysqli_query($conn,$sql);
		if($res){
			$i = 0;
			$ARRAY = array();
			while($row=$res->fetch_assoc()){
				$P = new stdClass();
				$P->name = $row["name"];
				$P->organiser = $row["organiser"];
				$P->venue = $row["venue"];
				$P->link = $row["link"];
				$P->begin_time = $row["begin_time"];
				$P->end_time = $row["end_time"];
				array_push($ARRAY,$P);
				$i++;
			}
			echo json_encode($ARRAY);
			//echo $myJSON;
		}
		else{
			trigger_error('Invalid query: ' . $res->error);
		}
	}
	else{
		trigger_error('Invalid query: ' . $conn->error);
	}

?>