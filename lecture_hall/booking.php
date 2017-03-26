<?php

    if(isset($_POST['submit'])){
        require_once("../includes/connect.php");
        $name = $_SESSION['name'];
        $date = $_SESSION["date"];
        $begin = $_SESSION['begin'];
        $end = $_SESSION['end'];
        $booker = $_SESSION['user']['name'];
        if($conn){
            $sql = "INSERT INTO time_table(date,begin,end,name,booked_by) VALUES('$date','$begin','$end','$name','$booker')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $message = "$name Succesfully Booked";
            }
            else{
                $message = "Invalid query";
            }
        }
        else{
            $message = "Error in connection";
        }
    }
    else{
        $message = "error in input";
    }
    
    ?>
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
        <body>
        <div>

            <ul style="box-shadow: 0px 0px 10px black;">

            <img src="../images/main_logo.png" width="200px" height="200px">
            <img id = "img" src="../images/back.png" width="200px" height="50">
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
        <div id="content" style="margin-left: 150px;margin-right: 470px;">
        <div class="col-sm-4">
                <div class='form--container'>
            <h3> <?php echo"$message";?></h3>
            <h3> <?php echo "Booking Details:";?></h3>
            <p> <?php echo "$name booked for $date";?></p>
            <p> <strong><?php echo "From : ";?></strong><?php echo "$begin"; ?></p>
            <p> <strong><?php echo "To : "; ?> </strong><?php echo " $end";?></h3>
            <p> <strong><?php echo "Booked By : ";?></strong><?php echo "$booker"; ?></p>
            <br><br><br><br><br>
        </div>
        </div>
        </div>
        </div>
        </body>
        </html>

        <?php
?>