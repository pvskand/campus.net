<?php

    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $organiser = $_POST["organiser"];
        $venue = $_POST["venue"];
        $begin_date = $_POST["begin_date"];
        $begin_time = $_POST["begin_time"];
        $end_date = $_POST["end_date"];
        $end_time = $_POST["end_time"];
        require_once("../includes/connect.php");
        $added_by = $_SESSION['user']['name'];
        $flag = 0;
        if($conn){
            $begin_time = "$begin_date "."$begin_time".":00";
            $end_time = "$end_date "."$end_time".":00";
            $sql = "INSERT INTO event(name,organiser,venue,link,begin_time,end_time,added_by) VALUES('$name','$organiser','$venue','','$begin_time','$end_time','$added_by')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $flag = 1;
                $message = "$name Succesfully Added to event list";
            }
            else{
                $message = "$conn->error";
            }    
        }
        else{
            $message = "Error in connection";
        }
    }
    else{
        $message = "error in input";
    }
    if($flag==0){
        ?>
        <html>
        <head>
        <link rel="stylesheet" href="../css/event_style.css">
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
              <li><a href="index.php#popup4">Dashboard</a></li>
              <li><a href="#home">Shop</a></li>
              <li><a href="#home">Sell</a></li>
              <li><a href="#news">Question Paper</a></li>
              <li><a class="active" href="http://localhost/lecture_hall_new/lecturehall_form.php">Lecture Hall Booking</a></li>
              <li><a href="index.php#popup1">Events</a></li>
              <li><a href="index.php#popup2">Books</a></li>
              <li><a href="index.php#popup3">Mess Menu</a></li>
              <li><a href="../attendance/form.php">Attendance</a></li>

            </ul>
        </div>
        <div id = "background" style="margin-left:15%;padding:25px 12px;height:600px;">
        <br><br>
        <div id="content" style="margin-left: 150px;margin-right: 470px;">
        <div class="col-sm-4">
                <div class='form--container'>
            <p><?php echo"$message";?></p>
            <br><br><br><br><br>
        </div>
        </div>
        </div>
        </div>
        </body>
        </html>
        <?php
    }
    else{
        ?>
        <html>
        <head>
        <link rel="stylesheet" href="../css/event_style.css">
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
      <li><a href="../lecture_hall/lecturehall_form.php">Lecture Hall Booking</a></li>
      <li><a class="active" href="../index.php#popup1">Events</a></li>
      <li><a href="../index.php#popup2">Books</a></li>
      <li><a href="../index.php#popup3">Mess Menu</a></li>
      <li><a href="../attendance/attendance_form.php">Attendance</a></li>

            </ul>
        </div>
        <div id = "background" style="margin-left:15%;padding:25px 12px;height:600px;">
        <br><br>
        <div id="content" style="margin-left: 150px;margin-right: 470px;">
        <div class="col-sm-4">
                <div class='form--container'>
            <p> <strong><?php echo"$message";?></strong></p>
            <p> <strong><?php echo "Event Name : "?></strong> <?php echo $name;?></p>
            <p> <strong><?php echo "Event Organiser : "?></strong> <?php echo $organiser;?></p>
            <p> <strong><?php echo "Event From : "?></strong> <?php echo $begin_time;?></p>
            <p> <strong><?php echo "Event To : "?></strong> <?php echo $end_time;?></p>
            <p> <strong><?php echo "Event Added By : "?></strong> <?php echo $added_by;?></p>
            <br><br><br><br><br>
        </div>
        </div>
        </div>
        </div>
        </body>
        </html>

        <?php
    }
?>

