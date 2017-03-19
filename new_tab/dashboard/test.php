<?php
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
?>