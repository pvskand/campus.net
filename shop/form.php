<!DOCTYPE html>
<html>
<head>
<script src="../js/jquery.min.js"></script>
<script src="../js/buy_sell_feed.js"></script>

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
    background-color: #EFF3F6;

    font-family: roboto_black;


}
#img{
    position: absolute;
    top: 28.3%;
    z-index: -2;
}
#user_text{
    z-index: 2000;
}
#content{
    background-color : transparent;
    font-family: roboto;
    position: absolute;

    left: 25%;
}

</style>
</head>
<?php require_once('../includes/connect.php');
    $pageUrl = basename($_SERVER['PHP_SELF']);
    $pageName = explode(".",$pageUrl)[0];
    if ($pageName != 'login' && $pageName != 'signin') {
        // echo "asda";
        // print_r($_SESSION);
        if (isset($_SESSION['user']) == false) {
            echo 'as';
            header("LOCATION: ../Login/login.php");  
        }   
    } 
?>
<body>


	<ul style="border:0px solid orange;">

	<a href="http://localhost/campus.net/"><img src="../images/main_logo.png" width="200px" height="200px"></a>
	<img id = "img" src="../images/back.png" width="200px" height="60">
	<br>
	<center>Hi <?php echo $_SESSION['user']['name'];?>!</center>

	<hr>

	<br>
	  <li><a href="../">Dashboard</a></li>
      <li><a class="active" href="../shop/form.php">Shop</a></li>
      <li><a href="../sell/sell_new.php">Sell</a></li>
      <li><a href="../question_paper/ques_view.php">Question Paper</a></li>
      <li><a href="../lecture_hall/lecturehall_form.php">Lecture Hall Booking</a></li>
      <li><a href="../index.php#popup1">Events</a></li>
      <li><a href="../index.php#popup2">Books</a></li>
      <li><a href="../index.php#popup3">Mess Menu</a></li>
      <li><a href="../attendance/form.php">Attendance</a></li>


	</ul>


<!-- <img src="images/3.png"> -->

<!-- <div id = "background" style="margin-left:15%;padding:25px 16px;height:1000px;"> -->
<div style="background-image: url('../images/3.png'); width: 100vw; height: 100vh; overflow-x: hidden;">
    <div id="content" style="background-color: white; width: 60%; margin-top: 5%;font-family: roboto_black; " > 
  </div>    
</div>

</body>
</html>
