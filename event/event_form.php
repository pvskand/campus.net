<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/event_style.css">

<style>
@font-face {
    font-family: helve;
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
      <li><a href="../lecture_hall/lecturehall_form.php">Lecture Hall Booking</a></li>
      <li><a class="active" href="../index.php#popup1">Events</a></li>
      <li><a href="../index.php#popup2">Books</a></li>
      <li><a href="../index.php#popup3">Mess Menu</a></li>
      <li><a href="../attendance/form.php">Attendance</a></li>

	</ul>
</div>

<div id = "background" style="margin-left:15%;padding:25px 10px;height:570px;">
<br>
<div id="content" style="margin-left: 150px;">
<div class="col-sm-4">
        <div class='form--container'>
            <form method="POST" action="event_add.php">
                <label>
                    <input name="name" type="text" onfocus="(this.type='text')" required>
                    <span>Event Name</span>
                </label>
                <br>
                <label>
                    <input name="organiser" type="text" onfocus="(this.type='text')" required>
                    <span>Organiser</span>
                </label>
                <br>
                <label>
                    <input name="venue" type="text" onfocus="(this.type='text')" required>
                    <span>Event Venue</span>
                </label>
                <br>
                <label>
                    <input name="begin_date" type="text" onfocus="(this.type='date')" required>
                    <span>Begining Date</span>
                </label>
                <br>
                <label>
                    <input name="begin_time" type="text" onfocus="(this.type='time')" required>
                    <span>Begining Time</span>
                </label>
                <br>
                <label>
                    <input name="end_date" type="text" onfocus="(this.type='date')" required>
                    <span>Ending Date</span>
                </label>
                <br>
                <label>
                    <input name="end_time" type="text" onfocus="(this.type='time')" required>
                    <span>Ending Time</span>
                </label>
                <br>
                <input type="submit" name="submit" value="Add Event" class='btn--main'/>
                <br><br>
            </form>
        </div>
    </div>
  </div>
</div>

</body>
</html>