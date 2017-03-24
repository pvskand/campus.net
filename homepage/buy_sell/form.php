<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="buy_sell_feed.js"></script>

<style>
@font-face {
    font-family: roboto_black;
    src: url(css/fonts/HelveticaNeue.ttf);
}
@font-face {
    font-family: roboto_black;
    src: url(css/fonts/Roboto-Regular.ttf);
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
    background-color: #EFF3F6;
    font-family: roboto;

    position: absolute;
    left: 25%;
}
</style>
</head>
<body>
<div>

	<ul>

	<a href="index.php"><img src="images/main_logo.png" width="200px" height="200px"></a>
	<img id = "img" src="images/back.png" width="200px" height="55">
	<br>
	<center><strong>Hi Gaurang!</strong></center>

	<hr>

	<br>
	  <li><a class="active" href="form.php">Shop</a></li>
	  <li><a  href="sell_new.php">Sell</a></li>
	  <li><a href="#news">Question Paper</a></li>
	  <li><a href="#contact">Lecture Hall Booking</a></li>
	  <li><a href="index.php#popup1">Events</a></li>
	  <li><a href="index.php#popup2">Books</a></li>
	  <li><a href="index.php#popup3">Mess Menu</a></li>
	  <li><a href="index.php#popup4">Attendance</a></li>
	</ul>
</div>

<div id = "background" style="margin-left:15%;padding:25px 16px;height:1000px;">

<div id="content" > 

   
  </div>
</div>

</body>
</html>
