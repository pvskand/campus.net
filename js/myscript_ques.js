timeToShow = 1000;
function showMessage() {	
	$("#message").fadeIn(100)
	setTimeout(function() {
	$("#message").fadeOut(100);
	}, timeToShow);
}
// function showMessage() {
//    $("#message").show(); 
// } 

// $("#logoutBut").on('click', function(e){
//   e.preventDefault();   
//   $.ajax({
//      url: 'ajax/logout.php',  
//      type:'GET', 
//   }).success(function(data){   
//      $("#message").text("Logged Out"); 
//       showMessage();
//       setTimeout(function () {
//         pageReload();    
//       }, timeShow);
//   }).fail(function(data){
//       $("#message").text("Please try again"); 
//       showMessage();
//   }) 
// });