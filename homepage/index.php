<!doctype html>


<html>
  <head>
    <meta charset="utf-8" />
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="css/styles_index.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="index_feed.js"></script>
  </head>


  <body style="min-height: 200px">
    <div class="fixed">
      <ul id="ul_main">
        <li><a href="index.php"><strong>Campus.Net</strong></a></li>
        <li><a href="index.php" class="active">Dashboard</a></li>
        <li><a href="form.php">Buy & Sell</a></li>
        <li><a href="news.asp">Lecture Hall Booking</a></li>
        <li><a href="contact.asp">Question Papers</a></li>
        <li><a href="about.asp">About</a></li>
      </ul>

    </div>

<style type="text/css">
  

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

<br>

<div id = "b">

  <div>
    <div class="top-left" id = "tl">
      <h3 style="display: inline;"> Upcoming Events </h3>
      <hr>
    </div>
  <a href="#popup1"><img src="images/button.png"  height="52" width="52" id = "logo1"> </a>

  </div>

  <div id="popup1" class="overlay">
    <div class="popup" id = "popup11">
      <h2>Upcoming Events</h2>
      <hr>
      <a class="close" href="#">&times;</a>
      <div id="events_id">
        
      </div>
  </div>
</div>




  <div>
    <div class="top-right" id="tr">
      <h3 style="display: inline;"> Books Issued </h3>
      <hr>
    </div>
  <a href="#popup2"><img src="images/button.png"  height="52" width="52" id = "logo2"></a>
  </div>

  <div id="popup2" class="overlay">
  <div class="popup" id = "popup22">
    <h2>Books</h2>
    <a class="close" href="#">&times;</a>
    <div id="books_id">
      
    </div>
  </div>
</div>



    <div class="bottom-left" id = "bl">
    <h3 style="display: inline; font-size: 20px"> Mess Menu Today</h3>
    <hr>
      <div id = "bf">
          <h3 style="display: inline;"> Breakfast </h3>
          <br>
          

      </div>

      <div id = "lunch">

          <h3 style="display: inline;"> Lunch </h3>
          <br>
         

      </div>

      <div id = "dinner">

          <h3 style="display: inline;"> Dinner </h3>
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
      <h3 style="display: inline;"> Attendance </h3>
      <hr>
      
    </div>
  <img src="images/button.png"  height="52" width="52" id = "logo4">
  </div>
</div>
  </body>
</html>

