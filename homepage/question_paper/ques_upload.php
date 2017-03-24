<!DOCTYPE html>
<html>
<head>
	<title>Question Paper Upload</title>
	<link rel="stylesheet" type="text/css" href="styles/ques.css">
</head>
<body>
<?php
include('includes/connect.php');
// echo '<pre>',print_r($_POST),'</pre>';
// echo '<pre>',print_r($_FILES),'</pre>';
$all_ok = 1;
if ($_POST["submit"]) {
	$course_id = $_POST["course_id"];
	$instructor_id = $_POST["instructor_id"];	
	$semester = $_POST["semester"];

	$sql = "INSERT INTO ques_detail(course_id, instructor_id, semester) 
			VALUES ($course_id, $instructor_id, '$semester')";
	echo $sql;
	if(mysqli_query($conn, $sql)){
		echo "Added to table ques_detail<br>";
	} 
	$lastInsertId = mysqli_insert_id($conn);
	echo $lastInsertId;
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
			echo "File extension : ".$file_ext."<br>";
			if (in_array($file_ext, $allowed)) {
				if ($file_error === 0){
					if ($file_size <= 3097152) { // size of 3MB
						$file_name_new = $course_id.'_'.$instructor_id.'_'.$semester.'_'.$numFilesUploaded.'.'.$file_ext;
						$file_destination = 'ques_upload/'.$file_name_new;
						if (move_uploaded_file($file_tmp, $file_destination)) {
							$numFilesUploaded =$numFilesUploaded + 1;
							$upload[$position] = "[{$file_name}] successfully uploaded.";
							$sql = "INSERT INTO ques_image(quesId, imageName) VALUES ($lastInsertId, '$file_name_new')";
							echo $sql;
							if(mysqli_query($conn, $sql)){
								echo $file_name." is inserted in ques_image table.<br>";
							} else {
								echo "Unable to add to table ques_image<br>".mysqli_error($conn);
							}			
						} else {
							$failed[$position] = "[{$file_name}] unable to upload.";
						}
					} else {	
						$failed[$position] = "[{$file_name}] has size greater than upload limit of 3MB.";
					}
				} else {
					$failed[$position] = "[{$file_name}]  errored with code {$file_error}";
				}
			} else {
				$failed[$position] = "[{$file_name}] does to support the allowed upload extension.";
			}
		}
		if (!empty($uploaded)) { // not empty
			foreach($uploaded as $x => $x_value) {
			    echo $x_value."<br>";
			}
			// echo '<pre>',print_r($uploaded),'</pre>';
		}

		if (!empty($failed)) {
			foreach($failed as $x => $x_value) {
			    echo $x_value."<br>";
			}
			// echo '<pre>',print_r($failed),'</pre>';
		}
	} else {
		echo "Please upload at least one file<br>";
	}
}

?>
</body>
</html>