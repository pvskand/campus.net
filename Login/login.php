<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in</title>
  <link rel="icon" href="../img/main_logo.png">
  <link rel="stylesheet" href="../css/ques_style.css">
<style>
@font-face {
    font-family: roboto_black;
    src: url(../css/fonts/HelveticaNeue.ttf);
}
@font-face {
    font-family: roboto_black;
    src: url(../css/fonts/Roboto-Regular.ttf);
}

body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 15%;
    background-color: #37474F;
    position: fixed;
    height: 100%;
    overflow: auto;
    font-family: roboto_black;
    color: white;
    font-size: 17px;

}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
    color: white;
    font-family: roboto_black;
}

li a.active {
    background-color: #0066ff;
    color: white;
}

li a:hover:not(.active) {
    background-color: #0066ff;
    color: white;
}
#background{
    background-image: url("../images/3.png");
    background-repeat: no-repeat;
	font-family: roboto_black;

}
#img{
	position: absolute;
    top: 29%;
    z-index: -2;
}
#user_text{
	z-index: 2000;
}
#content{
	background-color: #EFF3F6;
	font-family: roboto;

	position: absolute;
    left: 25%;
}
#message {
  position: absolute;
  width: 30%;
  height: 20%;
  z-index: 1000;
  background-color:#ccc;
  top: 25%;
  left: 33%;
  text-align: center;
  padding-top: 8%;
  /*content: "Successfully logged in";*/
  font-size: 200%;
  /*margin-top: 40%;*/
  color: black;
  border-radius:5px; 
  text-shadow:2px 2px 2px white;
  line-height: 20%;
  box-shadow: 0px 0px 6px #888888; 
  display: none;
}
</style>

</head>

<body>
<?php
  if (isset($_GET['login']) &&  $_GET['login'] == "out") {
    session_start();
    unset($_SESSION['user']);
  }
?>
<div id="message" align="center">Logged In</div>

<div id = "background" style="padding:25px 12px;height:500px;">
<br><br>
<div id="content" style="margin-left: 90px;">
    <div class='form--container'>
		<form id="logForm" autocomplete="off"> 
		  <?php 
		    // require_once('includes/header.php');
		  ?>
		  <label>
		  <input name="logemail" type="email" id="logemail" onfocus="(this.type='email')"  required />
		  <span>Email</span>
		  </label>
		  <br>
		  <label>
		  <input name="logpass"  type="password" id="logpass" onfocus="(this.type='password')" required />
		  <span>Password</span>
		  </label>
		  <br><br><br>
		  <input type="submit" id="logsub" name="logsub" value="Log in" class='btn--main'/>
           <br><br><br>
		</form>
		<p align="center">Not registered yet? <a href="signin.php">click here</a></p>
		<br><br>
	</div>
</div>
<script type="text/javascript" src="../js/myscript_ques.js"></script>
<script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>

<script type="text/javascript">
 $("#logForm").submit( function(e) {
      e.preventDefault();  
      var logemail = document.getElementById("logemail").value;
      var logpass = document.getElementById("logpass").value;
      if(logemail=="" || logpass=="") {
         alert("Please enter valid details in Login");
      } else{
        var data ={
          logemail: logemail,
          logpass: logpass
        };
        console.log(data);
        $.ajax({
          url: '../ajax/logged.php',
          type: 'POST',
          data: data,
        }).success(function(data) {
          console.log(data);
          if(data == "true") {
            $("#message").text('Logged in');
            showMessage();
            setTimeout(function(){
              window.location.assign("../index.php"); 
            }, 1000);
            // setTimeout(funtion (){
            //    window.location.assign("index.php"); 
            // },2000);
          } else {
            $("#message").text('Incorrect Entry');
            showMessage();
            // alert('Incorrect Entry');
          }
        }).fail(function(data) {
            alert("Please Try Again");
        });
      }
  });

</script>
</body>
</html>
