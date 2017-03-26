<!DOCTYPE html>
<html>
<head>
	<title>Question View</title>
	<link rel="stylesheet" type="text/css" href="../css/ques.css">	
	<link rel="stylesheet" href="../css/ques_style.css">
	<link rel="stylesheet" type="text/css" href="../css/ques_side_nav.css">	
<style type="text/css">
	#course_search {
		width: 90%;
		height:15px; 
		font-size:20px;
		border-radius: 3px;
		/*border: solid 5px #8c8c8c;*/
		transition: border 0.3s;
		background-color: white;
		-webkit-transition: width 0.4s ease-in-out;
		transition: width 0.4s ease-in-out;
		/*background-image: url('images/search.png');*/
		background-position: 5px 5px; 
		background-size: 20px 20px;
		background-repeat: no-repeat;
		padding: 8px 20px 8px 10px;
	}
	#course_search:focus {
		box-shadow: 0px 0px 20px gray;
	}	
	.boldText{
	    font-weight: bold;
	}
	
</style>
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
<div>
	<ul id="nav_bar" style="box-shadow: 0px 0px 10px black;">
	<img src="../images/main_logo.png"  height="190px">
	<img id="img" src="../images/back.png" height="45">
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

<div id = "background" style="margin-left:15%;padding:25px 12px;height:90vh;">
<br><br>
<!-- <h1 align="left">Question Paper View</h1> -->
<form id="quesForm" method="post"  autocomplete="off" enctype="multipart/form-data">
	<div style="position: relative; ">
		<div class="frmSearch" style="position: absolute; width: 30%; margin-left: 30%; ">
			<input type="text" id="course_search" style="" class="search_box" placeholder="Course Name" />
			<input type="text" name="course_id" style="display: none;" id="course_id" value ="0">
			<div class="suggesstion_box" id="course_suggestion" style="position: relative; z-index: 3; width: 100%">
				<ul id="course_list" style="width: 100%;">
				</ul>
			</div>
		</div>
	</div>
</form>

<div id="content" style="margin-top: 100px; background: white; width: 50%; margin-left: 5%; padding: 25px; box-shadow: 0px 0px 20px gray;">	
<p style="font-family: sans-serif;">Search Results display here.</p>
<p style="font-family: sans-serif;">Want to upload a question paper? 
<a href="http://localhost/campus.net/question_paper/ques.php">click here</a>
</div>
<script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script></p>
<script type="text/javascript" src="../js/ques.js"></script>
</body>
</html>
