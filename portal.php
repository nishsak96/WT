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
	    		<div>
	    		<?php
	    				//include 'connect.php';
	    				//$z=@$_COOKIE['name'];
	    				//$query="SELECT `Name` FROM `applicantbasic` WHERE `UniqueId`=\"".$z."\"";
	    				//$data=mysql_query($query);
	    				//echo $result=mysql_fetch_row($data);
	    				//echo '<ul class="nav navbar-nav"><li><a href="#">Hello,'.$data.'</a></li></ul>';
	    			 
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
   </div>

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
	</div>



   <p align="center">
   	<strong style="font-size:20px;">What do you want to apply for?</strong><br><br>
    <a href="benefitchkcoll.php"><button type="button" class="btn btn-default">College Admissions</button></a>&nbsp;&nbsp;&nbsp;
	<a href="benefitchkloan.php"><button type="submit" class="btn btn-default">Bank Loans</button></a>&nbsp;&nbsp;&nbsp;
	<a href="benefitchktax.php"><button type="submit" class="btn btn-default">Income Tax</button></a>
	</p>-->

	 <?php
	 include 'connect.php';
if(!isset($_COOKIE['add']))
{
 ob_start();

if(isset($_POST['ot']))
{

  $otp=$_POST['ot'];
  $pin=$_POST['pin'];
  $aadhar=$_COOKIE['aadhar'];
  $data=array(
        "consent"=> "Y",
        "auth-capture-request" => array(
            "aadhaar-id"=> $aadhar,
            "location"=> array(
                "type" =>"pincode",
                "pincode" => $pin
            ),
            "modality"=> "otp",
            "certificate-type"=> "preprod",
            "otp"=>$otp
        )
    ); 

$url ="http://139.59.30.133:9090/kyc/raw";
$payload = json_encode($data);

$ch = curl_init( $url );
# Setup request to send json via POST.
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);

//echo $result;
curl_close($ch);

$ress=json_decode($result, true);
$x2=$ress['success'];
$data=$ress['kyc']['photo'];
$name=$ress['kyc']['poi']['name'];
$dob=$ress['kyc']['poi']['dob'];
$gender=$ress['kyc']['poi']['gender'];
$addr=$ress['kyc']['poa']['house']." ".$ress['kyc']['poa']['street']." ".$ress['kyc']['poa']['vtc'];
$addr2=$ress['kyc']['poa']['dist']." ".$ress['kyc']['poa']['pc'];
$x=true;
setcookie('add',3,time()+36000);

//setcookie('pic',$data,time()+36000);
echo '<div style="border-radius:15%; border:2px #000000 solid; width:300px; position:relative; left:40%;">';
echo '<p align="center"><br><img src="data:image/jpg;base64,'.$data.'"/></p>';
echo '<hr>';
echo '<b><p align="center">'.$name.'</p></b>';
echo '<hr>';
echo '<b><p align="center">'.$dob.'</p></b>';
echo '<b><p align="center">'.$gender.'</p></b>';
echo '<hr>';
echo '<b><p align="center">'.$addr.'';
echo ' '.$addr2.'</p></b>';
echo '</div>';
$z=$_COOKIE['name'];
$query="INSERT INTO `aadharinfo`(`uniqueid`, `image`, `dob`, `gender`, `address`) VALUES ('".$z."','".$data."','".$dob."','".$gender."','".$addr." ".$addr2."')";
$queryresult=mysql_query($query);


//echo '<br><img src="data:image/jpg;base64,'.$data.'"/>';
		if($x==true)
		{
		//echo "true";
		//header("Location: naya.php");
		}
		else
		{
		echo "nahi hua na";
		}
	}
}
else
{
	$z=$_COOKIE['name'];

	$query="SELECT `uniqueid`, `image`, `dob`, `gender`, `address` FROM  `aadharinfo` where `uniqueid`='".$z."'";
	$queryresult=mysql_query($query);
	$queryresult1=mysql_fetch_assoc($queryresult);

	$data=$queryresult1['image'];
	$dob=$queryresult1['dob'];
	$gender=$queryresult1['gender'];
	$addr=$queryresult1['address'];

	$query="SELECT `Name` FROM  `applicantbasic` where `UniqueId`='".$z."'";
	$queryresult=mysql_query($query);
	$queryresult1=mysql_fetch_assoc($queryresult);

	$name=$queryresult1['Name'];

	

	echo '<div style="border-radius:15%; border:2px #000000 solid; width:300px; position:relative; left:40%; background-color:#c4c4c4;">';
	echo '<p align="center"><br><img src="data:image/jpg;base64,'.$data.'"/></p>';
	echo '<hr style="background-color:#000000;">';
	echo '<b><p align="center">Name: '.$name.'</p></b>';
	echo '<hr>';
	echo '<b><p align="center"> DOB:'.$dob.'</b>';
	echo '<b><br>'.$gender.'ale</p></b>';
	echo '<hr>';
	echo '<b><p align="center">'.$addr.'</p></b>';
	echo '</div>';
}
?>


</body>
</html>