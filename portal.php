<!DOCTYPE html>
<html>
<head>
	<title>
		Home-Reservation Portal
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
	    			<ul class="nav navbar-nav">
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

		$query="SELECT `Benefits` FROM `onlybenefits` WHERE `class`='B'";
		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		//echo $xx=count($data);
		foreach ($data as $i) {
			echo "$i <br>";	
		}
		//print_r($data);
	?>

	<!--<div class="container">
	<div class="row">			
			<form class="col-sm-offset-4 col-sm-5">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Enter a thing to do .. " name="input_pl" id="input_pl">
					<div class="input-group-btn">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Set Priority
						</button>
						<div class="dropdown-menu dropdown-menu-right" id="dropdownmenu">
							<a class="dropdown-item" href="#" id='dropdi' name='1'>Low</a>
							<a class="dropdown-item" href="#" id='dropdi' name='2'>Medium</a>
							<a class="dropdown-item" href="#" id='dropdi' name="3">High</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>-->

   <p align="center">
   	<strong style="font-size:20px;">What do you want to apply for?</strong><br><br>
    <a href="benefitchkcoll.php"><button type="button" class="btn btn-default">College Admissions</button></a>&nbsp;&nbsp;&nbsp;
	<a href="benefitchkloan.php"><button type="submit" class="btn btn-default">Bank Loans</button></a>&nbsp;&nbsp;&nbsp;
	<a href="benefitchktax.php"><button type="submit" class="btn btn-default">Income Tax</button></a>
	</p>

</body>
</html>