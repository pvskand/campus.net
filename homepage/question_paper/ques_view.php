<!DOCTYPE html>
<html>
<head>
	<title>Question View</title>
	<link rel="stylesheet" type="text/css" href="styles/ques.css">	
</head>
<body>
<h1 align="left">Question Paper View</h1>
<form id="quesForm" method="post" autocomplete="off" enctype="multipart/form-data">
	<div style="position: relative; height: 150px; ">
		<div class="frmSearch" style="position: absolute;">
			<input type="text" id="course_search" class="search_box" placeholder="Course Name" />
			<input type="text" name="course_id" style="display: none;" id="course_id" value ="0">
			<div class="suggesstion_box" id="course_suggestion" style=" position: relative; z-index: 3;">
				<ul id="course_list">
				</ul>
			</div>
		</div>
	</div>
</form>


<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
	quesView = 1; // used to know if page is for upload or view	
</script>
<script type="text/javascript" src="js/ques.js"></script>
<!-- <script type="text/javascript" src="js/ques_view.js"></script> -->
</body>
</html>