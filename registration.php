<!DOCTYPE html>
<html>
<head>
	<title>
		Home-Reservation Portal
	</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bodyelements.css">
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" style="background-color:#c4c4c4; padding-top:10px; padding-bottom:10px; position:relative;">
		<img src="PROKAB.jpg" alt="LOGO" height="127px" width="180px" style="margin-left:10px" />&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
		<font style="font-size:30px; top:50%; position:absolute;">Welcome to the Reservation Portal of India</font>
		<img src="emblem.jpg" alt="IndianEmblem" height="127px" width="85px" style="position:absolute; right:50px;" />
	</div>
<br>
	<div class="container-fluid"  >
	    <div class=" navbar navbar-default">
	    	<div class="container">
	    		<a href="#" class="navbar-brand">Cosmic Developers</a>
	    		<div >
	    			<ul class="nav navbar-nav" style="margin:0px; padding:0px;">
	    				<li><a href="HomeLayout.html">Home</a></li>
	    				<li><a href="registration.php">Register</a></li>
	    				<li><a href="signin.php">Login</a></li>
	    				<li><a href="benefits.html">Benefits</a></li>
	    				<li><a href="credits.html">Credits</a></li>
	    			</ul>
	    		</div>
	    	</div>
	    </div>
   </div>
   <?php
    require 'connect.php';
    if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['rpassword'])&&isset($_POST['mob']))
    {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $rpassword=$_POST['rpassword'];
      $mob=$_POST['mob'];
      if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($password)&&!empty($rpassword)&&!empty($mob))
      {
        if($password==$rpassword)
        {
          $password=sha1($password);
          $uni=strtolower($uni=substr($fname,0,1).substr($lname,0,1).substr($email,0,1).substr($password,16,5).substr($mob,1,2));
          echo '<p align="center"><b>This is your Unique Id: <i><u>'.$uni.'</u></i></b><br> Please Save it somewhere for future reference</p>';
           $query='INSERT INTO `applicantbasic`(`Date`, `name`, `email`, `password`,`uniqueid`,`Mobile`) VALUES (\''.date("d/m/y").'\',\''.$fname.' '.$lname.'\',\''.$email.'\',\''.$password.'\',\''.$uni.'\',\''.$mob.'\''.')';
          $result=mysql_query($query);
          echo '<p align="center">You are Registered. Please <a href="signin.php">Sign-in</a> now!</p>';
        }
        else
        {
          echo '<p align="center">Passwords do not match</p>';
          //header('Location: registration.php');
        }
      }
      else
      {
        echo '<p align="center">Fill all the fields properly!</p>';
        //header('Location: registration.php');
      }
    }
  ?>
<br>
<div class="container">
  <h2>Register Here!</h2>
  <form class="form-horizontal" name="regForm" method="post">
     <div class="form-group">
      <label class="control-label col-sm-2" for="email">FirstName:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="fname" placeholder="Enter Firstname">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="email">LastName:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="lname" placeholder="Enter Lastname">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Mobile no.</label>
      <div class="col-sm-3">
        <input type="number" class="form-control" name="mob" maxlength="10" placeholder="Enter 10 digit Mobile no." >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-3">
        <input type="email" class="form-control" name="email" placeholder="Enter Email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Re-enter Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="rpassword" placeholder="Re-enter Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Register</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>