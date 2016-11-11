<!DOCTYPE html>
<html>
<head>
	<title>
		Portal-Reservation Portal
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
	    		<?php
	    		$z=@$_COOKIE['login'];
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
<?php
		
		include 'connect.php';


		$z=@$_COOKIE['name'];
		$type=@$_COOKIE['class'];

		echo '<div style="border-radius:15%; border:2px #000000 solid; width:300px; position:absolute; left:2%;">';
		echo '<p align="center"><br><img src="./images/user/'.$z.'.jpg" width="150px" height="150px"/></p>';

		$query='SELECT * FROM `applicantbasic` WHERE `UniqueId`=\''.$z.'\'';
		$result=mysql_query($query);
		$data=mysql_fetch_assoc($result);
		$name=$data['Name'];
		$email=$data['email'];
		$mob=$data['Mobile'];
		echo '<hr>';
		echo '<b><p align="center">Name : '.$name.'</p></b>';
		echo '<hr>';
		echo '<b><p align="center">Email : '.$email.'</p></b>';
		echo '<b><p align="center">Mobile : '.$mob.'</p></b>';
		echo '<hr>';
		echo '<b><p align="center">UniqueID : '.$z.'';
		echo '</div>';




		

		$referer=@$_SERVER['HTTP_REFERER'];
		$x=strlen($referer);
		$past=substr($referer, $x-17);

		if($past=="signinstudent.php")
		{
			echo '<form method="post">
		<div class="form-group" style="float:right; margin-right:46%;">
	      <div class="col-sm-offset-2 col-sm-10" >
	        <button type="submit" class="btn btn-default" name="prev">Previous Benefit</button>
	      </div>
    	</div>
    </form>';
		}

		if(isset($_POST['prev']))
		{
			$query="SELECT `benefittype` FROM `applicantmoreinfo` WHERE `uniqueid`='".$z."'";
			$result=mysql_query($query);
			$data=mysql_fetch_assoc($result);
			$benefittype=$data['benefittype'];

			echo '<div style="position:relative;"><br><p align="center">Your Previous benefit was <b>Class '.$benefittype.' </b> type.<br>';
		
		}
		else if($past!="signinstudent.php")
		{
			
			
			echo '<div style="position:relative;"><br><p align="center">You have got <b>Class '.$type.' </b>Benefits <br>';
			echo 'You can now directly contact the institute and provide your Reserve ID an Unique Id to attain Benefits.<br>
			Please Submit a copy of all your <b>Documents </b> and <b> Income </b>Proof to Institute<br>
			Please note if you not have provided Genuine Details institute has full right to Cancel your application</p></div>';

			$headers = "From:Reservation Portal";

			$mailmsg="Hello you have successfully registered for a benefit on the portal. You can now directly contact the institute and provide your Reserve ID an Unique Id to attain Benefits. \n Please Submit a copy of all your Documents and Income Proof to Institute. Please note if you not have provided Genuine Details institute has full right to Cancel your application";

			mail($email,"Reservation Portal Notification",$mailmsg,$headers);

		}
		else
		{}

		
		
		
	?>

		<div style="float:right; margin-right:41.5%;">
			<br>
			<p align="center">Want to generate new benefits? <br> <a href="newbenefits.php">New benefits</a></p>
		</div>

	

</body>
</html>