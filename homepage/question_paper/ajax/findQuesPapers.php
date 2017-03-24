<?php
	require_once("../includes/connect.php");
	if (isset($_POST['course_id'])){
		$course_id = $_POST['course_id'];
		$sql ="SELECT qd.timestamp, qd.course_id, qd.instructor_id, qd.semester, i.name, c.title, qi.imageName 
			from ques_detail AS qd
		INNER JOIN ques_image AS qi
		 	ON  qi.quesId = qd.quesId
		INNER JOIN courses AS c
		 	ON  c.id = qd.course_id
	 	INNER JOIN instructor AS i
		 	ON  i.id = qd.instructor_id	
		 WHERE qd.course_id = $course_id"; 	 	
		$result = mysqli_query($conn, $sql);
		$data =  array();
		$count = 0;
		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		    	$data[$count] = $row;
		    	$count  = $count+1;
		    }
		}
		// print_r($data);
		echo json_encode($data); 	
	}
	

?>