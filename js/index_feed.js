$(document).ready(function()
{



		$.ajax({
			type: "POST",
			url: "includes/index_feed_events.php",
			success: function(data){
					 console.log("Hello");

				if (data.length >0) {
					data = $.parseJSON(data);
					for (i= 0; i < data.length; i++) {
						name = data[i]["name"]; 
						organiser = data[i]["organiser"]; 
						venue = data[i]["venue"];
						link = data[i]["link"];
						begin_time = data[i]["begin_time"];
						end_time = data[i]["end_time"];
						var bt = begin_time.split(" ");
						var et = end_time.split(" ");
						var info = name + " " + organiser + "  " + venue ; 
						$("#tl").append("<li>"+info+"</li>");
						$("#tl").append("<br>");

						$("#events_id").append("<li>"+info+"</li>");
						$("#events_id").append("<br>");




				
					}
				}
				
			}
		});
	
		$.ajax({
			type: "POST",
			url: "includes/index_feed_books.php",
			success: function(data){
					 console.log("Hello");

				if (data.length >0) {
					data = $.parseJSON(data);
					for (i= 0; i < data.length; i++) {
						name = data[i]["name"]; 
						author = data[i]["author"]; 
						due_date = data[i]["due_date"];
						var res = due_date.split(" ");
						var info = name + " " + author + "  " + res[0]; 
						$("#tr").append("<li>"+info+"</li>");
						$("#books_id").append("<li>"+info+"</li>");



				
					}
				}
				
			}
		});

		
			$.ajax({
				type: "POST",
				url: "includes/index_feed_mess.php",
				success: function(data){
						 console.log("Hello");

					if (data.length >0) {
						data = $.parseJSON(data);

						for (i= 0; i < data.length; i++) {
							console.log("hello man");
							bf1 = data[i]["item1"];
							bf2 = data[i]["item2"];
							bf3 = data[i]["item3"];
							bf4 = data[i]["item4"];

							ln1 = data[i+1]["item1"];
							ln2 = data[i+1]["item2"];
							ln3 = data[i+1]["item3"];
							ln4 = data[i+1]["item4"];

							dn1 = data[i+2]["item1"];
							dn2 = data[i+2]["item2"];
							dn3 = data[i+2]["item3"];
							dn4 = data[i+2]["item4"];
							var bf = bf1 + " " + bf2 + " "+ bf3 + " "+ bf4;
							var ln = ln1 + " " + ln2 + " "+ ln3 + " "+ ln4;
							var dn = dn1 + " " + dn2 + " "+ dn3 + " "+ dn4;
							$("#bf").append("<li>"+bf+"</li>");
							$("#bf").append("<br>");
							$("#lunch").append("<li>"+ln+"</li>");
							$("#lunch").append("<br>");
							$("#dinner").append("<li>"+dn+"</li>");





					
						}
					}
					
				}
			});


			$.ajax({
				type: "POST",
				url: "includes/	attendance.php",
				success: function(data){
						 

					if (data.length >0) {
						;
						data = $.parseJSON(data);

						for (i= 0; i < data.length; i++) {
							
							

							cn1 = data[i]["courses"];
							
							c1 = data[i]["present"];

							ct1 = data[i]["total"];



							var p1 = (c1/ct1)*100;
							var n = p1.toFixed(2);

							$("#attendance").append("<li>"+cn1 + " "+ n+"%"+"</li>");
							$("#attendance").append("<br>");




					
						}
					}
					
				}
			});

	






		
	
});