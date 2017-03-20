$(document).ready(function(){
	var d = new Date();
	var n = d.getHours();
	if (n > 19 || n < 6)
		// If time is after 7PM or before 6AM, apply night theme to ‘body’
		document.body.className = "night";
	else if (n > 16 && n < 19)
		// If time is between 4PM – 7PM sunset theme to ‘body’
		document.body.className = "sunset";
	else
		// Else use ‘day’ theme
		document.body.className = "day";
});


$.ajax({
	type: "POST",
	url: "http://localhost/dashboard/mess.php",
	success: function(data){
		console.log(data.length);
		data = $.parseJSON(data);
		document.getElementById("category").innerHTML = data["category"];
		document.getElementById("item1").innerHTML = data["item1"];
		document.getElementById("item2").innerHTML = data["item2"];
		document.getElementById("item3").innerHTML = data["item3"];
		document.getElementById("item4").innerHTML = data["item4"];
	}
});

$.ajax({
	type: "POST",
	url: "http://localhost/dashboard/event.php",
	success: function(data){
		if (data.length >0) {
			data = $.parseJSON(data);
			for (i= 0; i < data.length; i++) {
				console.log(data[i]["name"]);
				if(i==0){
					document.getElementById("event_name").innerHTML = data[i]["name"];
					document.getElementById("event_organiser").innerHTML = data[i]["organiser"];
					document.getElementById("event_venue").innerHTML = data[i]["venue"];
					document.getElementById("event_link").innerHTML = data[i]["link"];
					document.getElementById("event_begin_time").innerHTML = data[i]["begin_time"];
					document.getElementById("event_end_time").innerHTML = data[i]["end_time"];
				}
				if(i==1){
					document.getElementById("event_name2").innerHTML = data[i]["name"];
					document.getElementById("event_organiser2").innerHTML = data[i]["organiser"];
					document.getElementById("event_venue2").innerHTML = data[i]["venue"];
					document.getElementById("event_link2").innerHTML = data[i]["link"];
					document.getElementById("event_begin_time2").innerHTML = data[i]["begin_time"];
					document.getElementById("event_end_time2").innerHTML = data[i]["end_time"];
				}
				if(i==2){
					document.getElementById("event_name3").innerHTML = data[i]["name"];
					document.getElementById("event_organiser3").innerHTML = data[i]["organiser"];
					document.getElementById("event_venue3").innerHTML = data[i]["venue"];
					document.getElementById("event_link3").innerHTML = data[i]["link"];
					document.getElementById("event_begin_time3").innerHTML = data[i]["begin_time"];
					document.getElementById("event_end_time3").innerHTML = data[i]["end_time"];
				}
			}
	    }
	}
});

function saveNotes() {
	var notes = document.getElementById('notes').value.split('\n');   
	var notesContainer = "";
	for (i=0; i<notes.length; i++) {
		if(notes[i] != ' ') { 
			notesContainer += notes[i] + '\n';
			localStorage['notes'] = notesContainer;
		}
	}
}
  

document.addEventListener('DOMContentLoaded', function () {
    var notes = localStorage['notes'];
	if(!notes){
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