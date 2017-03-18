
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Buy and Sell</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css"> -->
    <script src="popup.js"></script>
  </head>
  <body style="min-height: 200px">
    <div class="fixed">
      <header>
        <h2><strong>Sell</strong></h2>
      </header>
      <hr>
    </div>
    <div id="content">
    <form action="sell_script.php" method = "POST" enctype="multipart/form-data">

		  Name :<br>
		  <input type="text" name="name" id="name" ><br>
		  Email :<br>
		  <input type="email" name="email" id="email"><br><br>
		  Item to be sold: <br>
		  <input type="text" name="item_name" id="item_name"><br>
		  Description: <br>
		  <input type="text" name="item_desc" id = "item_desc"><br>
		  Cost: <br>
		  <input type="number" name="item_cost" id = "item_cost"><br> <br>
      Phone Number: <br>
      <input type="tel" name="ph_no" id = "ph_no"><br>
      Select image to upload:
      <input type="file" value="helloWorld" name="fileToUpload[]" id="fileToUpload" multiple><br>
  


		  <input type="submit" value="Submit" name = "submit">
	</form>
    </div>
  </body>
</html>

