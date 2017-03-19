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
      data = JSON.parse(data);
      console.log(data.length);
      console.log(data[0]["name"]);
      document.getElementById("name").innerHTML = data["name"];
      /*
      document.getElementById("item1").innerHTML = data["item1"];
      document.getElementById("item2").innerHTML = data["item2"];
      document.getElementById("item3").innerHTML = data["item3"];
      document.getElementById("item4").innerHTML = data["item4"];
      */
    }
});


// Save url in chrome storage
function saveUrls() {
    
    // Fetch urls from textarea and split it
    var urls = document.getElementById('urls').value.split('\n');
    
    var urlsContainer = "";
    
    // run a loop on the fetched urls
    for (i=0; i<urls.length; i++) {


      // if the user input valid urls, save it in local chrome storage
      if(urls[i] != ' ') {
         
         urlsContainer += urls[i] + '\n';
         localStorage['urls'] = urlsContainer;

      }
    }
 }
  

document.addEventListener('DOMContentLoaded', function () {


  
  // add an event listener to load url when button is clicked
  //document.getElementById('button').addEventListener('click', loadUrls);
  
  // add an event listener to save url when button is clicked
  //document.getElementById('button').addEventListener('click', saveUrls);
    
    // reload the urls in the browser
    var urls = localStorage['urls'];
    if (!urls) {
      return;
    }
    document.getElementById('urls').value = urls;


});


window.setInterval(function(){
  saveUrls();
}, 100);