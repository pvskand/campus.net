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
/*
$.ajax({
    type: "POST",
    url: "ajax/findInstructor.php",
    data:'keyword='+$(this).val(),
    success: function(data){
      if (data.length >0) {
        data = $.parseJSON(data);
        for (i= 0; i < data.length; i++) {
          instructor_id = data[i]["id"];
          $("#instructor_list").append(
            "<li onClick='selectInstructor( "+instructor_id+")'>"+instructor_name+"</li>");
        }
      }
      $("#instructor_search").css("background","#FFF");
    }
});
*/

$.ajax({
    type: "POST",
    url: "http://localhost/dashboard/event.php",
    success: function(data){
      console.log(data.length);
      data = $.parseJSON(data);
      document.getElementById("event_name").innerHTML = data["name"];
      document.getElementById("event_organiser").innerHTML = data["organiser"];
      document.getElementById("event_venue").innerHTML = data["venue"];
      document.getElementById("event_link").innerHTML = data["link"];
      document.getElementById("event_begin_time").innerHTML = data["begin_time"];
      document.getElementById("event_end_time").innerHTML = data["end_time"];
      }
});

function saveUrls() {
    
    var urls = document.getElementById('urls').value.split('\n');
    
    var urlsContainer = "";
    
    for (i=0; i<urls.length; i++) {

      if(urls[i] != ' ') {
         
         urlsContainer += urls[i] + '\n';
         localStorage['urls'] = urlsContainer;

      }
    }
 }
  

document.addEventListener('DOMContentLoaded', function () {
    var urls = localStorage['urls'];
    if (!urls) {
      return;
    }
    document.getElementById('urls').value = urls;
});


window.setInterval(function(){
  saveUrls();
}, 100);