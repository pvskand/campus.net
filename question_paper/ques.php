<!DOCTYPE html>
<html>
<head>
	<title>Question Paper</title>
</head>
	<link rel="stylesheet" type="text/css" href="../css/ques.css">
	<!-- <meta charset="utf-8"> -->
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/ques_style.css">
  	<link rel="stylesheet" type="text/css" href="../css/ques_side_nav.css">
  	
  	<!-- 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
    <style type="text/css">
    	#uploadBtn:hover {
    		background-color: #212121;
    	}
    
    </style>
<body>
<?php
	require_once('../includes/header.php');
?>
<div>
	<ul id="nav_bar" style="box-shadow: 0px 0px 10px black;">
	<img src="../images/main_logo.png" width="200px" height="200px">
	<img id="img" src="../images/back.png" width="200px" height="52">
	<br>
	<center>Hi <?php echo $_SESSION['user']['name'];?>!</center>
	<hr>
	<br>
      <li><a href="../">Dashboard</a></li>
	  <li><a href="../shop/form.php">Shop</a></li>
	  <li><a href="../sell/sell_form.php">Sell</a></li>
	  <li><a class="active" href="../question_paper/ques_view.php">Question Paper</a></li>
	  <li><a  href="../lecture_hall/lecturehall_form.php">Lecture Hall Booking</a></li>
	  <li><a href="../index.php#popup1">Events</a></li>
	  <li><a href="../index.php#popup2">Books</a></li>
	  <li><a href="../index.php#popup3">Mess Menu</a></li>
	  <li><a href="../attendance/form.php">Attendance</a></li>
	</ul>
</div>

<div id = "background" style="margin-left:15%;padding:25px 12px;height:90vh;">
<br><br>
<!-- <div id="content" style="margin-left: 150px;"> -->
	<div style="width:50%; margin-left: 25%;  background-color: white; height: 80vh; box-shadow: 0px 0px 20px gray">
	<div style="font-size: 30px; margin-left: 30%; padding-top:5%;">Upload Here</div>
        <!-- <div class='form--container'> -->
        <form method="POST" action="ques_upload.php" autocomplete="off" enctype="multipart/form-data" style="margin-top: -2%;">                
            <div style="position: relative; margin-left: 25%;  height: 150px; ">
				<div class="frmSearch" style="position: absolute;  margin-top: 10%;">
					<input type="text" id="course_search" class="search_box" placeholder="Course Name" required />
					<input type="text" name="course_id" style="display: none;" id="course_id" value ="0">
					<div class="suggesstion_box" id="course_suggestion" style=" position: relative; z-index: 3;">
						<ul id="course_list">
						</ul>
					</div>
				</div>
				<div class="frmSearch" style="position:absolute; top: 40px; margin-top: 13%;">
					<input type="text" id="instructor_search" class="search_box" style="z-index: -1" placeholder="Instructor Name"  required />
					<input type="text" name="instructor_id" style="display: none;" id="instructor_id" value = "0">
					<div class="suggesstion_box" id="instructor_suggestion">
						<ul id="instructor_list">
						</ul>
					</div>
				</div>
			</div>	

			<span style="margin-left: 25%">Semester :</span>
			<select name="semester" style="padding: 3px">
				<option>Spring</option>
				<option>Fall</option>
			</select>
			<br><br>

			<span style="margin-left: 25%">Exam Type :</span>
			<select name="exam_type" style="padding: 3px;">
			<option>Major</option>
			<option>Minor</option>
			</select>
			<br><br>

			<!-- <input class="search_box" type="text" name="semester" style="padding:5px; margin-left: 25%;" placeholder="" maxlength="4" required> -->

			<input class="search_box" type="number" name="year" style="padding:5px; margin-left: 25%;" placeholder="Year" maxlength="4" required>
			<br><br>
			<span style="margin-left: 25%">Select image to upload:</span><br>
			<input style="margin-left: 25%" type="file" value="helloWorld" name="fileToUpload[]" id="fileToUpload" multiple required><br>
			<input type="submit" id="uploadBtn" style="margin-top: 30px; width: 50%; margin-left: 25%"  class='btn--main' value="Upload Image" name="submit">

                <!-- <br> -->
                <!-- <label>
                    <input name="instructor_search" type="text" onfocus="(this.type='text')" required>
                    <span>Instructor Search</span>
                </label>
                <br>
                <label>
                    <input name="year" type="number" onfocus="(this.type='number')" maxlength="4" required>
                    <span>Year</span>
                </label>
                <br>
                <label>
                    <br>
                    <input name="fileToUpload" type="file" onfocus="(this.type='file')" multiple style="margin-top: 10px;"><br>
                    <span>Attachments</span>
                </label> -->
            <!-- <input type="submit" name="submit" class='btn--main'></button> -->
        </form>
        <!-- </div> -->
    <!-- </div> -->

   
  </div>
</div>

<!-- <h1 align="left">Question Paper Upload</h1>
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
		<input type="number" name="year" style="padding:5px" placeholder="Year" maxlength="4" required>
	</div>

	Select image to upload:
	<input type="file" value="helloWorld" name="fileToUpload[]" id="fileToUpload" multiple><br>
	<input type="submit" style="margin-top: 10px" value="Upload Image" name="submit">
</form> -->

<script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
	quesView = 0; // used to know if page is for upload or view
</script>
<script type="text/javascript" src="../js/ques.js"></script>
</html>