<!DOCTYPE html>
<html>
<head>
	<title>
		Tax-Reservation Portal
	</title>


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
		    			$z=@$_COOKIE['loginins'];
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

  <p>
  	<div class="container">
  		 <h2>Tax Benefit Allotment</h2>
  <form class="form-horizontal" name="regForm" method="post" >

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Unique ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="uniqueid" placeholder="Enter Unique ID" maxlength="10">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Annual gross Income:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="income" placeholder="Enter Amount in Rupees">
      </div>
    </div>
   
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" >Calculate Benefit</button>
      </div>
    </div>
<!--  -->

  </form>
  	</div>
  </p>

  <?php

  ?>

   
   
</body>
</html>