<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style_lecture_hall_form.css">
<script src="../js/jquery.min.js"></script>

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
<div>

	<ul style="box-shadow: 0px 0px 10px black;">

	<img src="../images/main_logo.png" width="200px" height="200px">
	<img id = "img" src="../images/back.png" width="200px" height="57">
	<br>
	<center>Hi <?php echo $_SESSION['user']['name'];?>!</center>

	<hr>

	<br>
      <li><a href="../">Dashboard</a></li>
      <li><a href="../shop/form.php">Shop</a></li>
      <li><a href="../sell/sell_new.php">Sell</a></li>
      <li><a href="../question_paper/ques_view.php">Question Paper</a></li>
      <li><a class="active" href="../lecture_hall/lecturehall_form.php">Lecture Hall Booking</a></li>
      <li><a href="../index.php#popup1">Events</a></li>
      <li><a href="../index.php#popup2">Books</a></li>
      <li><a href="../index.php#popup3">Mess Menu</a></li>
      <li><a href="../attendance/form.php">Attendance</a></li>

	</ul>
</div>

<div id = "background" style="margin-left:15%;padding:25px 12px;height:600px;">
<br><br>
<div id="content" style="margin-left: 150px;">
<div class="col-sm-4">
        <div class='form--container'>
            <form method="POST" action="http://localhost/campus.net/lecture_hall/available.php">
                <select name="name" required style="font-size: 18px;font-family: Lato, Helvetica, Arial;">
                    <option value="" disabled selected>Select the desired Lecture Hall</option>
                    <option>Lecture Hall 1</option>
                    <option>Lecture Hall 2</option>
                    <option>Lecture Hall 3</option>
                    <option>Lecture Hall 4</option>
                    <option>Lecture Hall 5</option>
                    <option>Lecture Hall 6</option>
                    <option>Lecture Hall 7</option>
                    <option>Lecture Hall 8</option>
                    <option>Lecture Hall 9</option>
                    <option>Lecture Hall 10</option>
                    <option>Computer Lab 1</option>
                    <option>Computer Lab 2</option>
                    <option>MP Hall</option>
                    <option>Dance Room</option>
                </select>
                <br><br>
                <label>
                    <input name="date" type="text" onfocus="(this.type='date')" required>
                    <span>Date</span>
                </label>
                <br>
                <label>
                    <input name="begin" type="text" onfocus="(this.type='time')" required>
                    <span>Begining Time</span>
                </label>
                <br>
                <label>
                    <input name="end" type="text" onfocus="(this.type='time')" required>
                    <span>Ending Time</span>
                </label>
                <br><br>
                <input type="submit" name="submit" value="Check availability" class='btn--main'/>
                <br><br>
            </form>
        </div>
    </div>

   
  </div>
</div>

</body>
</html>