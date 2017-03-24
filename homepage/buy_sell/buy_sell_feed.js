
/*FUNCTIONS TO DISPLAY THE REAL TIME DATA OF BUY AND SELL FROM THE DATABASE USING AJAX AND PHP GET REQUEST*/

function tableCreate(body, tbl)
{


    for(var i = 0; i < 1; i++){
        var tr = tbl.insertRow();
        for(var j = 0; j < 7; j++)
        {

            var td = tr.insertCell();
            if (j == 0)
            	td.appendChild(document.createTextNode("Name"));
        	else if (j==1)
        		td.appendChild(document.createTextNode("EMAIL"));
        	else if (j==2)
        		td.appendChild(document.createTextNode("Item Name"));
        	else if (j==3)
        		td.appendChild(document.createTextNode("Description"));
        	else if (j==4)
        		td.appendChild(document.createTextNode("Cost"));
        	else if (j==5)
        		td.appendChild(document.createTextNode("Phone Number"));
        	else if (j==6)
        		td.appendChild(document.createTextNode("Image"));
            td.style.border = '1px solid black';
            
        }
    }
    body.appendChild(tbl);
}

function show_image(src, width, height) {
    var img = document.createElement("img");
    img.src = src;
    img.width = width;
    img.height = height;

    // This next line will just add it to the <body> tag
    document.body.appendChild(img);
}


$(document).ready(function()
{
	
	 
		$.ajax({
			type: "POST",
			url: "buy_sell_feed.php",
			success: function(data){

			    var body = document.body,
		        tbl  = document.createElement('table');
			    tbl.style.width  = '75%';
			    tbl.style.border = '1px solid black';
			    tableCreate(body, tbl);

				if (data.length >0) {
					data = $.parseJSON(data);
					for (i= 0; i < data.length; i++) {
						name = data[i]["name"]; 
						email = data[i]["email"]; 
						item = data[i]["item"]; 
						desc = data[i]["description"];
						cost = data[i]["cost"];
						ph_no = data[i]["phone_number"];
						image_name =  data[i]["image_name"];  

					var tr = tbl.insertRow();
			        for(var j = 0; j < 7; j++)
			        {
			           
		                var td = tr.insertCell();
		                if (j == 0)
		                	td.appendChild(document.createTextNode(name));
		            	else if (j==1)
		            		td.appendChild(document.createTextNode(email));
		            	else if (j==2)
		            		td.appendChild(document.createTextNode(item));
		            	else if (j==3)
		            		td.appendChild(document.createTextNode(desc));
		            	else if (j==4)
		            		td.appendChild(document.createTextNode(cost));
		            	else if (j==5)
		            		td.appendChild(document.createTextNode(ph_no));
		            	else if (j==6)
		            	{
		            			
		            		var oImg = document.createElement("img");
		            		var path = "sell_upload/" + image_name;
					        oImg.setAttribute('src', path);
					        oImg.width = '100';
					        oImg.height = '100';
					        td.appendChild(oImg);






		            		
		            		// var img = "See Image";
		            			
		            		// td.appendChild(document.createTextNode(img));
		            		// td.href = path;
		            		// td.title = img;
		            	}
		                td.style.border = '1px solid black';  
			        }
					}
					body.appendChild(tbl);
				}
				
			}
		});
	
});