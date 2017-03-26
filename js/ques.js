
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
		url: "../ajax/findCourse.php",
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
		url: "../ajax/findInstructor.php",
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
	var pageUrl = document.URL;
	if (pageUrl.includes("ques_view") == true) {
		var myNode = document.getElementById("content");
		while (myNode.firstChild) {
		    myNode.removeChild(myNode.firstChild);
		}
		findQuesPapers(id);
	}
}
function selectInstructor(id) {
	$("#instructor_search").val(instructor_array[id]);
	$("#instructor_id").val(id);
	$("#instructor_suggestion").hide();
}

function tableCreate(tbl){
    for(var i = 0; i < 1; i++){
        var tr = tbl.insertRow();
        for(var j = 0; j < 6; j++) {

            var td = tr.insertCell();
            td.setAttribute("class" , "boldText"); 
            if (j == 0)
            	td.appendChild(document.createTextNode("Instructor Name"));
        	else if (j==1)
        		td.appendChild(document.createTextNode("Year"));
        	else if (j==2)
        		td.appendChild(document.createTextNode("Exam Type"));
        	else if (j==3)
        		td.appendChild(document.createTextNode("Semester"));
        	else if (j==4)
        		td.appendChild(document.createTextNode("Posted on"));
        	else if (j==5)
        		td.appendChild(document.createTextNode("Download"));
        }
    }
    $("#content").append(tbl);
}

linkNames = [];

function findQuesPapers(course_id) {
	// console.log(course_id);
	var data = {course_id : course_id};
	$.ajax({
		type: "POST",
		url: "../ajax/findQuesPapers.php",
		data:data,
		success: function(data){
			quesPath = 'ques_upload/';
			data = $.parseJSON(data);
			if (data.length >0) {
				// console.log(data);
				prev_course_id = data[0]["course_id"];
				prev_year =  data[0]["year"];
				prev_instructor_id = data[0]["instructor_id"];
				prev_image_name = data[0]["imageName"];
				prev_timestamp = data[0]["timestamp"];
				prev_timestamp = prev_timestamp.split(' ')[0];
				prev_semester = data[0]["semester"];
				prev_exam_type = data[0]["exam_type"];

				prev_course_name = data[0]["title"]; // course title
				prev_instructor_name = data[0]["name"]; // instructor name 
				numRows = 0;
				insertRow = 1;
				pages = 1;
				linkNames = new Array();
				linkNames[0] = new Array();
				linkNames[numRows].push(prev_image_name);
				tbl  = document.createElement('table');
			    tbl.style.width  = '100%';
			    // tr.style.border = "1px solid #000";
				tableCreate(tbl);

				tr = tbl.insertRow();
		        for(var j = 0; j < 6; j++) {
	                var td = tr.insertCell();
	                if (j == 0)
	                	td.appendChild(document.createTextNode(prev_instructor_name));
	            	else if (j==1)
	            		td.appendChild(document.createTextNode(prev_year));
	            	else if (j==2)
	            		td.appendChild(document.createTextNode(prev_exam_type));
	            	else if (j==3)
	            		td.appendChild(document.createTextNode(prev_semester));
	            	else if (j==4)
	            		td.appendChild(document.createTextNode(prev_timestamp));
	            	else if (j==5) {
	            		var link = document.createElement('a');
	            		link.id = 'link0';
	            		link.innerHTML = "Page "+pages;
						link.setAttribute('download', prev_image_name);
						// link.onClick = function(){
							// for (var k = 0; k < linkNames[0].length; k++) {
								link.setAttribute('href', quesPath+prev_image_name);
								// link.click();
							// }
						// };
						td.appendChild(link);
						// for (var i = 0; i < linkNames.length; i++) {
						// 	link.setAttribute('href', linkNames[i]);
						// 	link.click();
						// }
	            	}

		        }
				$("#content").append(tbl);



				for (i= 1; i < data.length; i++) {
					course_name = data[i]["title"]; // course title
					instructor_name = data[i]["name"]; // course name
					date_time = data[i]["timestamp"];
					image_name = data[i]["imageName"];
					course_id = data[i]["course_id"];
					instructor_id = data[i]["instructor_id"];
					year = data[i]["year"];
					timestamp = data[i]["timestamp"];
					timestamp = timestamp.split(' ')[0];
					if  (course_id == prev_course_id && instructor_id == prev_instructor_id && prev_year == year) {
						linkNames[numRows].push(image_name);
						pages++;
						insertRow = 0;
					} else {
						numRows++;
						pages = 1;
						insertRow = 1;
						linkNames[numRows] = new Array();
						linkNames[numRows].push(image_name);
						tr = tbl.insertRow();
					}
			        for(var j = 0; j < 6; j++) {
		                if (j == 0 && insertRow == 1) {
		                	td = tr.insertCell();
		                	td.appendChild(document.createTextNode(instructor_name));
		            	} else if (j==1 && insertRow == 1) {
		                	td = tr.insertCell();
		            		td.appendChild(document.createTextNode(year));
		            	} else if (j==2 && insertRow == 1) {
		                	td = tr.insertCell();
		            		td.appendChild(document.createTextNode(exam_type));
		            	} else if (j==3 && insertRow == 1) {
		                	td = tr.insertCell();
		            		td.appendChild(document.createTextNode(semester));
		            	} else if (j==4 && insertRow == 1) {
		                	td = tr.insertCell();
		            		td.appendChild(document.createTextNode(timestamp));
		            	} else if (j==5) {
		            		// if (pages == 0) {
		                		td = tr.insertCell();
		            		// }
		            		// td.appendChild(document.createTextNode(desc));
		            		var link = document.createElement('a');
		            		// link.id = 'link'+i;
		            		link.innerHTML = "Page "+pages;
							link.setAttribute('download', image_name);
									link.setAttribute('href', quesPath+image_name);

							td.appendChild(link);
		            	}

			        }
					prev_course_name =  course_name; // course title
					prev_instructor_name = instructor_name; // course name
					prev_image_name = image_name ;
					prev_course_id = course_id;
					prev_instructor_id = instructor_id;
					prev_year = year;
					prev_timestamp = timestamp;

					$("#content").append(tbl);
				} 
			}  else {
				// document.getElementById("content").innerHTML =  "No results to display.";
				$("#content").html("No results to display.");	
			}
			// console.log(linkNames);
			$("#instructor_search").css("background","#FFF");
		}
	});
}



