<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bodyelements.css">
</head>


<body>


	<div class="container-fluid" style="background-color:#c4c4c4; padding-top:10px; padding-bottom:10px; position:relative;">
		<img src="PROKAB.jpg" alt="LOGO" height="127px" width="180px" style="margin-left:10px" />&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
		<font style="font-size:30px; top:50%; position:absolute;">Welcome to the Reservation Portal of India</font>
		<img src="emblem.jpg" alt="IndianEmblem" height="127px" width="85px" style="position:absolute; right:50px;" />
	</div>

<br>
	<div class="container-fluid" >
	    <div class=" navbar navbar-default">
	    	<div class="container">
	    		<div class="navbar-header">
	    			<a href="#" class="navbar-brand">Cosmic Developers</a>
	    		</div>
	    		<div>
	    			<?php 
              $z=@$_COOKIE['login'];
              setcookie('add',3,time()-30);
              if($z==1)
              {
                echo '<ul class="nav navbar-nav navbar-right"><li><a href="signout.php">Logout</a></li></ul>';
              }
              else
              {
                die('<ul class="nav navbar-nav"><li><a>You arent logged in.</a></li> <li><a href="signin.php">SignIn</a></li></ul>');
              }
            ?>
	    		</div>
	    	</div>
	    </div>
   </div>
   <div class="container">
	<form method='POST' action="portal.php" >
<div class="form-group">
      <h2> Enter OTP</h2>
      <input type="text" class="form-control" id="email" name="ot" placeholder="Enter your OTP"><br>
      <input type="text" class="form-control" id="email" name="pin" placeholder="Enter your address PIN-Code">
    </div>
    
    
  <!-- Trigger the modal with a button -->
  <button type="submit" class="btn btn-info btn-lg" >Verify</button>
</form>
</div>

</body>
</html>