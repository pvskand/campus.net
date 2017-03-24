<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style_sell.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
    background-image: url("images/3.png");
    background-repeat: no-repeat;
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

	<ul style="box-shadow: 0px 0px 10px black;">

	<img src="images/main_logo.png" width="200px" height="200px">
	<img id = "img" src="images/back.png" width="200px" height="55">
	<br>
	<center><strong>Hi Gaurang!</strong></center>

	<hr>

	<br>
	  <li><a href="form.php">Shop</a></li>
	  <li><a class="active" href="sell_new.php">Sell</a></li>
	  <li><a href="#news">Question Paper</a></li>
	  <li><a href="#contact">Lecture Hall Booking</a></li>
	  <li><a href="index.php#popup1">Events</a></li>
	  <li><a href="index.php#popup2">Books</a></li>
	  <li><a href="index.php#popup3">Mess Menu</a></li>
	  <li><a href="index.php#popup4">Attendance</a></li>
      
	</ul>
</div>

<div id = "background" style="padding:25px 12px;height:700px;">

<div id="content" style="margin-left: 150px;">
<div class="col-sm-4">
        <div class='form--container'>
            <form action="sell_script.php" method = "POST" enctype="multipart/form-data">
                <label>
                    <input name="name" type="text" onfocus="(this.type='text')" required>
                    <span>Name</span>
                </label>
                <br>
                <label>
                    <input name="email" type="text" onfocus="(this.type='email')" required>
                    <span>Email</span>
                </label>
                <br>
                <label>
                    <input name="item_name" type="text" onfocus="(this.type='text')" required>
                    <span>Item to be sold</span>
                </label>
                <br>
                <label>
                    <input name="item_desc" type="text" onfocus="(this.type='text')" required>
                    <span>Description</span>
                </label>
                <br>
                <label>
                    <input name="item_cost" type="number" onfocus="(this.type='number')" required>
                    <span>Cost</span>
                </label>
                <br>
                <label>
                    <input name="ph_no" type="tel" onfocus="(this.type='tel')" required>
                    <span>Contact No.</span>
                </label>
                <br>
                <label>
                    <br>
                    <input name="fileToUpload[]" id="fileToUpload" type="file" onfocus="(this.type='file')" multiple style="margin-top: 10px;"><br>
                    <span>Attachments</span>
                </label>
                <input type="submit" name="submit" class='btn--main'></button>   
            </form>
        </div>
    </div>
  </div>
</div>

</body>
</html>