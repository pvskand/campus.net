<!DOCTYPE html>
<html>
<head>
	<title>Question Paper Upload</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/ques.css">
		<!-- <meta charset="utf-8"> -->
	<link rel="stylesheet" type="text/css" href="../css/ques_side_nav.css">
	<link rel="stylesheet" href="../css/ques_style.css">
</head>
<?php require_once('../includes/connect.php');
    $pageUrl = basename($_SERVER['PHP_SELF']);
    $pageName = explode(".",$pageUrl)[0];
    if ($pageName != 'login' && $pageName != 'signin') {
        // echo "asda";
        // print_r($_SESSION);
        if (isset($_SESSION['user']) == false) {
            echo 'as';
            header("LOCATION: ../Login/login.php");  
        }   
    } 
?>
<body>
<?php require_once('../includes/connect.php');
    $pageUrl = basename($_SERVER['PHP_SELF']);
    $pageName = explode(".",$pageUrl)[0];
    if ($pageName != 'login' && $pageName != 'signin') {
        // echo "asda";
        // print_r($_SESSION);
        if (isset($_SESSION['user']) == false) {
            echo 'as';
            header("LOCATION: ../Login/login.php");  
        }   
    } 
?>
<body>
<div>
	<ul id="nav_bar" style="box-shadow: 0px 0px 10px black;">
	<img src="../images/main_logo.png" width="200px" height="210px">
	<img id="img" src="../images/back.png" width="200px" height="65">
	<br>
	<center>Hi <?php echo $_SESSION['user']['name'];?>!</center>
	<hr>
	<br>
		<li><a href="../">Dashboard</a></li>
	  <li><a href="../shop/form.php">Shop</a></li>
	  <li><a href="../sell/sell_new.php">Sell</a></li>
	  <li><a class="active" href="../question_paper/ques_view.php">Question Paper</a></li>
	  <li><a  href="../lecture_hall/lecturehall_form.php">Lecture Hall Booking</a></li>
	  <li><a href="../index.php#popup1">Events</a></li>
	  <li><a href="../index.php#popup2">Books</a></li>
	  <li><a href="../index.php#popup3">Mess Menu</a></li>
	  <li><a href="../attendance/form.php">Attendance</a></li>
	</ul>
</div>
<div id = "background" style="margin-left:15%;padding:25px 12px;height:600px;">
<br><br>
	<div id="content" style="margin-left: 150px; padding-left: 10px; padding-top: 20px; width: 35%; height: 70vh; background-color: white; box-shadow: 0px 0px 20px gray">
<?php
// include('includes/connect.php');
// echo '<pre>',print_r($_POST),'</pre>';
// echo '<pre>',print_r($_FILES),'</pre>';
$all_ok = 1;
if (isset($_POST["submit"])) {
	$course_id = $_POST["course_id"];
	$instructor_id = $_POST["instructor_id"];	
	$year = $_POST["year"];
	$semester = $_POST["semester"];
	$exam_type = $_POST["exam_type"];

	$sql = "INSERT INTO ques_detail(course_id, instructor_id, year, semester, exam_type) 
			VALUES ($course_id, $instructor_id, '$year', '$semester', '$exam_type')";
	// echo $sql;
	if(mysqli_query($conn, $sql)){
		// echo "Added to table ques_detail<br>";
	} 
	$lastInsertId = mysqli_insert_id($conn);
	// echo $lastInsertId;
	
	if (!empty($_FILES['fileToUpload']['name'][0]) && $all_ok == 1) {
		$files = $_FILES['fileToUpload'];
		$uploaded = array();
		$failed = array();
		// echo "Started";
		$numFilesUploaded = 1;
		$allowed = array('txt', 'jpg', 'jpeg' , 'pdf' ,'doc', 'docx');
		foreach ($files['name'] as $position => $file_name) {
			$file_tmp = $files['tmp_name'][$position];
			$file_size = $files['size'][$position];
			$file_error = $files['error'][$position];

			$file_name_array = explode('.', $file_name);
			$file_ext = strtolower(end($file_name_array));
			// echo "File extension : ".$file_ext."<br>";
			if (in_array($file_ext, $allowed)) {
				if ($file_error === 0) {
					if ($file_size <= 3097152) { // size of 3MB
						$file_name_new =$course_id.'_'.$instructor_id.'_'.$year.'_'.$semester.'_'.$exam_type.'_'.$numFilesUploaded.'.'.$file_ext;
						$file_destination = 'ques_upload/'.$file_name_new;
						if (move_uploaded_file($file_tmp, $file_destination)) {
							$numFilesUploaded =$numFilesUploaded + 1;
							$upload[$position] = "{$file_name} successfully uploaded.";
							$sql = "INSERT INTO ques_image(quesId, imageName) VALUES ($lastInsertId, '$file_name_new')";
							// echo $sql;
							if(mysqli_query($conn, $sql)){
								// echo $file_name." is inserted in ques_image table.<br>";
							} else {
								// echo "Unable to add to table ques_image<br>".mysqli_error($conn);
							}			
						} else {
							$failed[$position] = "{$file_name} unable to upload.";
						}
					} else {	
						$failed[$position] = "{$file_name} has size greater than upload limit of 3MB.";
					}
				} else {
					$failed[$position] = "{$file_name}  errored with code {$file_error}";
				}
			} else {
				$failed[$position] = "{$file_name} does to support the allowed upload extension.";
			}
		}
		// echo '<pre>',print_r($upload),'</pre>';
		if (!empty($upload)) { // not empty
			foreach($upload as $x => $x_value) {
			    echo $x_value."<br>";
			}
		}
		// echo '<pre>',print_r($failed),'</pre>';
		if (!empty($failed)) {
			foreach($failed as $x => $x_value) {
			    echo $x_value."<br>";
			}
		}
	} else {
		echo "Please upload at least one file<br>";
	}
}
?>
	</div>
</div>
</body>
</html>