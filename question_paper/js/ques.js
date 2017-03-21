
var course_array = []; // associate array stores id with course title
var instructor_array = []; // associate array stores id with instructor title
$(document).ready(function(){
	// console.log("Ready");
	// document.getElementById("course_id").value = 10;
	// $("#course_id").val(10);
	// console.log($("#course_id").val());

	$("#course_search").keyup(function(){
		$("#course_list").empty();	
		$("#course_suggestion").show();
		course_array = [];
		$.ajax({
		type: "POST",
		url: "ajax/findCourse.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#course_search").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#course_suggesstion").show();
			$("#course_list").empty();	
			$("#course_id").val("0");
			if (data.length >0) {
				data = $.parseJSON(data);
				for (i= 0; i < data.length; i++) {
					course_id = data[i]["id"];
					course_title = data[i]["title"];
					course_code = data[i]["code"];
					course_array[course_id] = course_title;
					$("#course_list").append(
						"<li onClick='selectCourse("+course_id+")'>"+course_title+"</li>");
				}
			}
			$("#course_search").css("background","#FFF");
		}
		});
	});
	$("#instructor_search").keyup(function(){
		// console.log("Callled");
		$("#instructor_list").empty();
		$("#instructor_suggestion").show();
	
		// console.log($("#instructor_list").children().length);
		
		instructor_array = []; 
		$.ajax({
		type: "POST",
		url: "ajax/findInstructor.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#instructor_search").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#instructor_list").empty();
			$("#instructor_suggesstion").show();
			$("#instructor_id").val("0");
			// console.log(data);
			if (data.length >0) {
				data = $.parseJSON(data);
				for (i= 0; i < data.length; i++) {
					instructor_id = data[i]["id"];
					instructor_name = data[i]["name"];
					console.log(instructor_name);
					instructor_desig = data[i]["desig"];
					instructor_array[instructor_id] = instructor_name;
					$("#instructor_list").append(
						"<li onClick='selectInstructor( "+instructor_id+")'>"+instructor_name+"</li>");
				}
			}
			$("#instructor_search").css("background","#FFF");
		}
		});
	});
	$('#quesForm').submit(function (e) {
	    var course_id = $('#course_id').val();
	    var instructor_id = $('#instructor_id').val();
	    var files = $("#fileToUpload").val();
	    
	    if (course_id  == '0' || instructor_id== '0' || files == "") {
	        alert('Please fill valid entries');
	     	e.preventDefault();
	    }
	});
});
function selectCourse(id) {
	$("#course_search").val(course_array[id]);
	$("#course_id").val(id);
	$("#course_suggestion").hide();
	if (ques_view != null && ques_view == 1) {
		findQuesPapers();
	}
}
function selectInstructor(id) {
	$("#instructor_search").val(instructor_array[id]);
	$("#instructor_id").val(id);
	$("#instructor_suggestion").hide();
}
/*
function findQuesPapers() {
	$.ajax({
		type: "POST",
		url: "ajax/findQuesPapers.php",
		data:'keyword='+$(this).val(),
		success: function(data){
			if (data.length >0) {
				data = $.parseJSON(data);
				for (i= 0; i < data.length; i++) {
					course_name = data[i]["title"]; // course title
					instructor_name = data[i]["name"]; // course name
					date_time = data[i]["timestamp"];
					imageName = data[i]["imageName"];
					// console.log(instructor_name);
					instructor_desig = data[i]["desig"];
					instructor_array[instructor_id] = instructor_name;
					$("#instructor_list").append(
						"<li onClick='selectInstructor( "+instructor_id+")'>"+instructor_name+"</li>");
				}
			}
			$("#instructor_search").css("background","#FFF");
		}
	});
}
*/