<?php

    if(true){
        $name = $_POST["name"];
        $date = $_POST["date"];
        $begin = $_POST["begin"];
        $end = $_POST["end"];
        $flag_new = 0;
        date_default_timezone_set('Asia/Kolkata');
        $date_today = date('Y-m-d');

        if($date < $date_today){
            $message =  "Invalid date input";
        }
        else{
            $begin_inter = (DateTime::createFromFormat( 'H:i', $begin));
            $begin = $begin_inter->format( 'H:i:s');

            $end_inter = (DateTime::createFromFormat( 'H:i', $end));
            $end = $end_inter->format( 'H:i:s');

            //echo "$date $begin $end";

            $x = strtotime($begin);
            $y = strtotime($end);
            //echo "$x $y";

            if($x >= $y){
                $message =  "Invalid time input";
            }
            else{
                require_once("../includes/connect.php");
                if($conn){
                    $sql = "SELECT * FROM  time_table WHERE date='$date'";
                    $res = mysqli_query($conn,$sql);
                    if($res){
                        $flag = 0; // flag will be updated to 1 if that room is already booked
                        if($res->num_rows > 0){
                            while($row=$res->fetch_assoc()){
                                $row_name = $row["name"];
                                if($row_name==$name){
                                    $row_begin = $row["begin"];
                                    $row_end = $row["end"];
                                    $row_date = $row["date"];
                                    //echo "$begin  $row_begin ";
                                    if($begin >= $row_begin && $begin < $row_end){
                                        $flag = 1;
                                    }
                                    else if($end >= $row_begin && $end <= $row_end){
                                        $flag = 1;
                                    }
                                }
                            }
                        }
                        if($flag == 1){
                            $message =  "$name is already booked in that time slot";
                        }
                        else{
                            $flag_new = 1;
                            $message =  "Confirm your booking of $name";
                        }
                    }
                    else{
                        $message =  "Invalid Query";
                    }
                }
                else{
                    trigger_error('Invalid query: ' . $conn->error);
                }
            }
        }
    }
    else{
        $message =  "error in input";
    }

    if($flag_new==0){
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
            <img id = "img" src="../images/back.png" width="200px" height="51">
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
            <p> <?php echo"$message"."!";?></p>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        </div>
        </div>
        </div>
        </body>
        </html>
        <?php
    }
    else{
        $_SESSION['name'] = $name;
        $_SESSION["date"] = $date;
        $_SESSION['begin'] = $begin;
        $_SESSION['end'] = $end;
        ?>
        <html>
        <head>
        <link rel="stylesheet" href="../css/style_lecture_hall_form.css">
        <script src="../js/jquery.min.js"></script>
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
            <img id = "img" src="../images/back.png" width="200px" height="51">
            <br>
            <center><strong>Hi Gaurang!</strong></center>
            <hr>
            <br>
              <li><a href="../">Dashboard</a></li>
      <li><a href="../shop/form.php">Shop</a></li>
      <li><a href="../sell/sell_form.php">Sell</a></li>
      <li><a href="../question_paper/ques_new.php">Question Paper</a></li>
      <li><a class="active" href="../lecture_hall/lecturehall_form.php">Lecture Hall Booking</a></li>
      <li><a href="../index.php#popup1">Events</a></li>
      <li><a href="../index.php#popup2">Books</a></li>
      <li><a href="../index.php#popup3">Mess Menu</a></li>
      <li><a href="../attendance/form.php">Attendance</a></li>
            </ul>
        </div>
        <div id = "background" style="margin-left:15%;padding:25px 12px;height:600px;color: black;">
        <br><br>
        <div style="margin-left: 150px;">
            <div style="margin-right: 500px;margin-left: 120px;">
                <div class='form--container'>
            <p> <?php echo"$message";?></p>
            <p><strong>Date: </strong><?php echo"$date";?></p>
            <p><strong>From: </strong><?php echo"$begin";?></p>
            <p><strong>To: </strong><?php echo"$end";?></p>
            
            <form method="POST" action="http://localhost/campus.net/lecture_hall/booking.php">
            <input type="submit" name="submit" value="Book" class='btn--main'>
            </form>
            </div>
        </div>
        </div>
        </body>
        </html>
        <?php
    }

?>