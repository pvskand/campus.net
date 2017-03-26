<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>HomePage</title>
    <link rel="shortcut icon" href="iages/icon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/styles_index.css"> 
    <script src="js/jquery.min.js"></script>
    <script src="js/index_feed.js"></script>

    <style type="text/css">

@font-face {
    font-family: helve;
    src: url(css/fonts/HelveticaNeue.ttf);
}
@font-face {
    font-family: roboto_black;
    src: url(css/fonts/Roboto-Regular.ttf);
}

body {
  
  background-image: url('images/new_back.png');
  background-repeat: no-repeat;
  background-size: cover;
  margin:0;
}

.topnav {
  overflow: hidden;
  background-color: #26238;
}

.topnav a { 
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 7px 8px;
  text-decoration: none;
  font-size: 17px;
  font-family: roboto_black;
  margin-left: 10px;
}

.topnav a:hover {
  background-color: #161F24;
  color: white;
  font-family: roboto_black;
  box-shadow: 0px 0px 6px black;
}

.topnav a.active {
    background-color: #0066ff;
    color: white;
    font-family: roboto_black;
    box-shadow: 0px 0px 6px black;
}

.logout{
    color: white;
    border-top-left-radius:5px;
   border-bottom-left-radius:5px;
   border-top-right-radius:5px;
   border-bottom-right-radius:5px;
}

.logout:hover{
    color: white;
}  

#popup11{
  background: url("images/bubbles.png") #16C7C3;
  background-repeat: no-repeat;
  background-position: 200px;
  color: #FFFFFF;
}
#events_id{
  background:  #16C7C3;
  color: #FFFFFF;
  position: absolute;
  top: 30%;
  left: 10%;
}

#popup22{
  background: url("images/books.png") #FB5D58;
  background-repeat: no-repeat;
  background-position: 200px;
  color: #FFFFFF;
}
#books_id{
   color: #FFFFFF;
}



</style>

  </head>
<?php require_once('includes/connect.php');
    $pageUrl = basename($_SERVER['PHP_SELF']);
    $pageName = explode(".",$pageUrl)[0];
    if ($pageName != 'login' && $pageName != 'signin') {
        // echo "asda";
        // print_r($_SESSION);
        if (isset($_SESSION['user']) == false) {
            echo 'as';
            header("LOCATION: Login/login.php");  
        }   
    } 
?>
<div style="background-color:#37474F;padding-top: 30px;">
</div
<div style="background-color:#37474F;">
  <div class="topnav" style="margin-left: 5px;">
    <a style="background-color:#37474F"><img src="images/web_logo.png" style="max-height: 30px;"></a>
    <a class="active" href="http://localhost/campus.net/" style="margin-left: 250px;">Dashboard</a>
    <a href="http://localhost/campus.net/shop/form.php">Shop</a>
    <a href="http://localhost/campus.net/sell/sell_new.php">Sell</a>
    <a href="http://localhost/campus.net/lecture_hall/lecturehall_form.php">Lecture Hall</a>
    <a href="http://localhost/campus.net/question_paper/ques_view.php">Question Papers</a>
    <div class="logout" style="float: right;margin-right: 40px;">
    <a href="Login/login.php?login=out" style="float: right;margin-right: 20px;"><span title="Log Out">Hi 
    <?php 
      echo $_SESSION['user']['name'];
    ?>
    </span></a>
    </div>
  </div>
</div>
<div style="background-color:#37474F;padding-bottom: 6px;">
</div>

<div id = "b">

  <div>
    <div class="top-left" id = "tl">
      <p style="display: inline;font-size: 30px;"> Upcoming Events </p>
      <hr>
    </div>
  <a href="event/event_form.php"><img src="images/add.png"  height="52" width="52" id = "logo0"> </a>
  <a href="#popup1"><img src="images/button.png"  height="52" width="52" id = "logo1"> </a>

  </div>

  <div id="popup1" class="overlay">
    <div class="popup" id = "popup11">
      <p style="display: inline;font-size: 30px;">Upcoming Events</p>
      <hr>
      <a class="close" href="#">&times;</a>
      <div id="events_id">
      </div>
  </div>
</div>


  <div>
    <div class="top-right" id="tr">
      <p style="display: inline;font-size: 30px;"> Books Issued </p>
      <hr>
    </div>
  <a href="#popup2"><img src="images/button.png"  height="52" width="52" id = "logo2"></a>
  </div>

  <div id="popup2" class="overlay">
  <div class="popup" id = "popup22">
    <p style="display: inline;font-size: 30px;">Books</p>
    <a class="close" href="#">&times;</a>
    <div id="books_id">
      
    </div>
  </div>
</div>



    <div class="bottom-left" id = "bl">
    <p style="display: inline;font-size: 30px;"> Mess Menu Today</p>
    <hr>
      <div id = "bf">
          <p style="display: inline;font-size: 20px;"> Breakfast </p>
          <br>
          

      </div>

      <div id = "lunch">

          <p style="display: inline;font-size: 20px;"> Lunch </p>
          <br>
         

      </div>

      <div id = "dinner">

          <p style="display: inline;font-size: 20px;"> Dinner </p>
          <br>

      </div>

  <a href="#popup3"><img src="images/button.png"  height="52" width="52" id = "logo3"></a>
  </div>

  <div id="popup3" class="overlay">
  <div class="popup_new">
  <a class="close" href="#">&times;</a>
    <img src="images/mess_menu.png">
  </div>
</div>


  <div class="bottom-right" id = "br">
    <div id = "attendance">
      <p style="display: inline;font-size: 30px;"> Attendance </p>
      <hr>
      
    </div>
    <!--<a href="#popup1"><img src="images/add.png"  height="52" width="52" id = "logo5"> </a>-->
  <a href="attendance/form.php"><img src="images/button.png"  height="52" width="52" id = "logo4"></a>
  </div>
</div>

  </body>
</html>

