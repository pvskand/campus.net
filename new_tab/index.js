$(document).ready(function(){
	var d = new Date();
	var n = d.getHours();
	if (n > 19 || n < 6){
		// If time is after 7PM or before 6AM, apply night theme to ‘body’
		document.body.className = "night";
		document.getElementById("greetings").innerHTML = "Good Night";
	}
	else{
		// Else use ‘day’ theme
		document.body.className = "day";
		document.getElementById("greetings").innerHTML = "Have a nice day!";
	}
});

$.ajax({
	type: "POST",
	url: "http://localhost/new_tab_include/mess.php",
	success: function(data){
		data = $.parseJSON(data);
		document.getElementById("category").innerHTML = data["category"];
		document.getElementById("item1").innerHTML = data["item1"];
		document.getElementById("item2").innerHTML = data["item2"];
		document.getElementById("item3").innerHTML = data["item3"];
	}
});

event1 = {};
event2 = {};
event3 = {};

$.ajax({
	type: "POST",
	url: "http://localhost/new_tab_include/event.php",
	success: function(data){
		if (data.length >0) {
			data = $.parseJSON(data);
			for (i= 0; i < data.length; i++) {
				if(i==0){
					event1.name = data[i]["name"];
					event1.organiser = data[i]["organiser"];
					event1.venue = data[i]["venue"];
					event1.link = data[i]["link"];
					event1.begin_time = formatDate(data[i]["begin_time"]);	
					event1.end_time = data[i]["end_time"];
					document.getElementById("event1_name").innerHTML = event1.name;
					document.getElementById("event1_organiser").innerHTML = event1.organiser;
					document.getElementById("event1_venue").innerHTML = event1.venue;
					//document.getElementById("event1_link").innerHTML = event1.link;
					document.getElementById("event1_begin_time").innerHTML = event1.begin_time;
					//document.getElementById("event1_end_time").innerHTML = event1.end_time;
				}
				if(i==1){
					event2.name = data[i]["name"];
					event2.organiser = data[i]["organiser"];
					event2.venue = data[i]["venue"];
					event2.link = data[i]["link"];
					event2.begin_time = formatDate(data[i]["begin_time"]);
					event2.end_time = data[i]["end_time"];
					document.getElementById("event2_name").innerHTML = event2.name;
					document.getElementById("event2_organiser").innerHTML = event2.organiser;
					document.getElementById("event2_venue").innerHTML = event2.venue;
					//document.getElementById("event2_link").innerHTML = event2.link;
					document.getElementById("event2_begin_time").innerHTML = event2.begin_time;
					//document.getElementById("event2_end_time").innerHTML = event2.end_time;
				}
				if(i==2){
					event3.name = data[i]["name"];
					event3.organiser = data[i]["organiser"];
					event3.venue = data[i]["venue"];
					event3.link = data[i]["link"];
					event3.begin_time = formatDate(data[i]["begin_time"]);
					event3.end_time = data[i]["end_time"];
					document.getElementById("event3_name").innerHTML = event3.name;
					document.getElementById("event3_organiser").innerHTML = event3.organiser;
					document.getElementById("event3_venue").innerHTML = event3.venue;
					//document.getElementById("event3_link").innerHTML = event3.link;
					document.getElementById("event3_begin_time").innerHTML = event3.begin_time;
					//document.getElementById("event3_end_time").innerHTML = event3.end_time;
				}
			}
	    }
	}
});


// Save notes in chrome storage
function saveNotes() {
    
    // Fetch notess from textarea and split it
    var notes = document.getElementById('notes').value.split('\n');
    
    if(notes.length==1 && notes[0]==""){
    	localStorage['notes'] = "";
    }
    else{
	    var notesContainer = "";
	    
	    // run a loop on the fetched notes
	    for (i=0; i<notes.length; i++) {

	      // if the user input valid notes, save it in local chrome storage
	      if(notes[i] != ' ' && notes[i]!='') {
	         
	         notesContainer += notes[i] + '\n';
	         localStorage['notes'] = notesContainer;

	      }
	    }
	}
 }
  

document.addEventListener('DOMContentLoaded', function () {


  
  // add an event listener to load url when button is clicked
  //document.getElementById('button').addEventListener('click', loadUrls);
  
  // add an event listener to save url when button is clicked
  //document.getElementById('button').addEventListener('click', saveUrls);
    
    // reload the urls in the browser
    var notes = localStorage['notes'];
    if (!notes) {
      return;
    }
    else if(notes=="\n" || notes=="\n\n"){
    	return;
    }
    document.getElementById('notes').value = notes;


});


window.setInterval(function(){
  saveNotes();
}, 100);

function formatDate(datetime) {
	var monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
	var res = datetime.split(" ");
	var date_ = res[0];
	var time_ = res[1];
	var res_date = date_.split("-");
	var res_time = time_.split(":");
	return monthNames[parseInt(res_date[1])-1] + " " + res_date[2] + ", " + res_time[0] + ":" + res_time[1];

}