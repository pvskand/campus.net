<?php
	require_once("connect.php");
	if($conn){
		$today = date("l");
		if($today=="Monday"){
			$day = 1;
		}
		else if($today=="Tuesday"){
			$day = 2;
		}
		else if($today=="Wednesday"){
			$day = 3;
		}
		else if($today=="Thursday"){
			$day = 4;
		}
		else if($today=="Friday"){
			$day = 5;
		}
		else if($today=="Saturday"){
			$day = 6;
		}
		else if($today=="Sunday"){
			$day = 7;
		}
		date_default_timezone_set('Asia/Kolkata');
		$hour =  date('H');
		$minute = date('i');
		if($hour>=22){
			$category = "Breakfast";
		}
		else if($hour==21 && $min>=30){
			$category = "Breakfast";	
		}
		else if($hour>=14){
			$category = "Dinner";
		}
		else if($hour>=10){
			$category = "Lunch";
		}
		else if($hour>=9 && $min>=30){
			$category = "Lunch";
		}
		else{
			$category = "Breakfast";
		}
		$sql = "SELECT item1,item2,item3,item4 FROM $category WHERE day=$day";
		$res = mysqli_query($conn,$sql);
		if($res){
			$value = mysqli_fetch_object($res);
			$item1 = $value->item1;
			$item2 = $value->item2;
			$item3 = $value->item3;
			$item4 = $value->item4;
			$food = new StdClass;
			$food->category = $category;
			$food->item1 = $item1;
			$food->item2 = $item2;
			$food->item3 = $item3;
			$food->item4 = $item4;
			$myJSON = json_encode($food);
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