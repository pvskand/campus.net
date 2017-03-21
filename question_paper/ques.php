<!DOCTYPE html>
<html>
<head>
	<title>Question Paper</title>
</head>
<link rel="stylesheet" type="text/css" href="styles/ques.css">
<body>
<h1 align="left">Question Paper Upload</h1>
<form action="ques_upload.php" id="quesForm" method="post" autocomplete="off" enctype="multipart/form-data">
	<div style="position: relative; height: 150px; ">
		<div class="frmSearch" style="position: absolute;">
			<input type="text" id="course_search" class="search_box" placeholder="Course Name" />
			<input type="text" name="course_id" style="display: none;" id="course_id" value ="0">
			<div class="suggesstion_box" id="course_suggestion" style=" position: relative; z-index: 3;">
				<ul id="course_list">
				</ul>
			</div>
		</div>
		<div class="frmSearch" style="position:absolute; top: 40px; margin-top: 20px;">
			<input type="text" id="instructor_search" class="search_box" style="z-index: -1" placeholder="instructor Name" />
			<input type="text" name="instructor_id" style="display: none;" id="instructor_id" value = "0">
			<div class="suggesstion_box" id="instructor_suggestion">
				<ul id="instructor_list">
				</ul>
			</div>
		</div>
	</div>
	
	<div>
		<label>Semester: </label>
		<select name="semester" style="padding: 5px">
			<option>Fall</option>
			<option>Spring</option>
		</select>
	</div>

	Select image to upload:
	<input type="file" value="helloWorld" name="fileToUpload[]" id="fileToUpload" multiple><br>
	<input type="submit" style="margin-top: 10px" value="Upload Image" name="submit">
</form>

<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
	quesView = 0; // used to know if page is for upload or view
</script>
<script type="text/javascript" src="js/ques.js"></script>
</html>