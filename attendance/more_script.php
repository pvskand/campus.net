<?php


require_once('../includes/connect.php');



$user_id = 1;

$status = (string)$_POST['radio'];


if($status == 1)
{
	header("Location: attendance_form.php");
	exit();
}
else
{
	header("Location: ../index.php");
	exit();
}











?>