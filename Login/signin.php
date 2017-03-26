<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign in</title>
<link rel="icon" href="../images/main_logo.png">
  <link rel="stylesheet" href="../css/ques_style.css">
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
  left: 30%;
}

/*#message {
  position: absolute;
  width: 30%;
  height: 20%;
  z-index: 1000;
  background-color:#ccc;
  top: 25%;
  left: 33%;
  text-align: center;
  padding-top: 8%;
  font-size: 200%;
  color: black;
  border-radius:5px; 
  text-shadow:2px 2px 2px white;
  line-height: 20%;
  box-shadow: 0px 0px 6px #888888; 
  display: none;
}
*/
</style>

</head>
 


<body>
<!-- <div id="message" align="center"></div> -->


<?php 
//require_once('includes/connect.php');
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3000)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();
?>

<div id = "background" style="padding:25px 10px;height:500px;">
<br><br>
<div id="content" style="margin-left:0%; width: 400px">
    <div class='form--container'>
<?php 
  if (isset($_POST['signsub'])) {
      require_once('../includes/connect.php');
      $createID = true;
      $sql = "SELECT * FROM userdet";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) >0 ) {
        while($row = mysqli_fetch_assoc($result)) {
          if($row['Email'] == $_POST['email']) {         
          // if($row['Email'] == "subh@g.com") {         
            echo "<h2>This email already Exist</h2>";
            $createID = false;
            break;
          }  
        }
      }

      if($createID == true) {
        error_reporting(E_ERROR | E_PARSE);
        $storePass = password_hash(mysql_real_escape_string($_POST['password']) , 
          PASSWORD_BCRYPT, array('cost' => 10));  
        $name = $_POST['name'];
        $email = $_POST['email'];

      $sql = "INSERT INTO userdet (Name, Password, Email)
      VALUES ('$name','$storePass', '$email')";

      if (mysqli_query($conn, $sql)) {
          $_SESSION['user']['email'] = $email;
          $_SESSION['user']['name'] = $name;
          $_SESSION['LAST_ACTIVITY'] = time();
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
?>
     
    <h3>Your Account has been successfully created </h3>
    <h2 style="font-family:roboto">Welcome
    <?php 
    echo ucFirst($_POST['name']);
    ?>
    </h2>
    <?php }?>

    <form action="<?php if($createID == true) echo '../index.php'; else echo 'signin.php' ?>" method="post">
      <button id="requestBut" class='btn--main' type="submit" name="checkSub">Go to <?php if($createID == true) echo 'Dashboard'; else echo 'Signin page' ?>
      </button>
    </form> 

<?php
  } else {
?>

		<form method="post" action="signin.php">
			<label>
			<input name="name" type="text" id="signName" onfocus="(this.type='text')" required />
			<span>Name</span>
			</label>
			<br>
			<label>
			<input name="email" type="email" id="signEmail" onfocus="(this.type='email')" required />
			<span>Email</span>
			</label>
			<br>
			<label>
			<input name="password" type="password" id="signPass" onfocus="(this.type='password')" required />
			<span>Password</span>
			</label>
			<br><br>
			<input type="submit"  id="signsub" name="signsub" value="Register" class='btn--main'/>
           	<br><br>
		</form>
		<p align="center">Already a member? <a href="login.php">click here</a></p>
        <br><br>

<?php
  }
?>
  </div>
</div>       
<script type="text/javascript">
  function validateSignForm() {
      //console.log("Here we come sigj Dofmr");
      //alert("Here we come sigj Dofmr");
      var signName = document.getElementById("signName").value;
      var signPass = document.getElementById("signPass").value;
      var signEmail = document.getElementById("signEmail").value;
      
      if(signName== "" || signPass== ""  ||signEmail== "") {
        alert("Please enter valid details in SignUp")
        return false;
     } 
  }
</script>

 <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
 <script type="text/javascript" src="../js/myscript_ques.js"></script>

</body>
</html>
