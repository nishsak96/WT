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

      <p align="center">
  <font color="red">
    <b>
        Please Verify all Documents before Generating Benefits
    </b>
  </font>
</p>


     <?php
    include 'connect.php';
    $z=$_COOKIE['ins'];
    $finalmerit=0;
    if(isset($_POST['income'])&&isset($_POST['uni']))
    {
        $income=$_POST['income'];
        $uni=$_POST['uni'];

        if(!empty($income)&&!empty($uni))
        {
                  $query="SELECT `benefittype`,`beneselect` FROM `applicantmoreinfo` WHERE `uniqueid`='".$uni."'";
                  $result=mysql_query($query);
                  $data=mysql_fetch_assoc($result);
                  
                  //echo '<p align="center"><b><u>'.$uni.' has been alotted Class '.$data['benefittype'].' benefit. </u></b></p>';

                   /*$query="INSERT INTO `tax`(`uniqueid`, `income`) VALUES ('".$uni."','".$income."')";
                  $result=mysql_query($query);

                  $query="INSERT INTO `benefitset`(`instituteId`, `uniqueId`, `benefittype`) VALUES ('".$z."','".$uni."','".$data['benefittype']."')";
                  $result=mysql_query($query);

                  if($data['benefittype']=='A')
                    echo '<p align="center"><b><u>'.$uni.' is required to pay 18% Taxes if eligible. </u></b></p>';
                  if($data['benefittype']=='B')
                    echo '<p align="center"><b><u>'.$uni.' is required to pay 15% Taxes if eligible. </u></b></p>';
                  if($data['benefittype']=='C')
                     echo '<p align="center"><b><u>'.$uni.' is required to pay 10% Taxes if eligible. </u></b></p>';

*/
                   if($data['beneselect']=='Tax')
            {

                  if($data['benefittype']=='C')
                   { echo '<p align="center"><b><u>'.$uni.' is required to pay 20% Taxes if eligible. </u></b></p>';
                  $finalmerit=20;}
                  if($data['benefittype']=='B')
                    {echo '<p align="center"><b><u>'.$uni.' is required to pay 15% Taxes if eligible. </u></b></p>';
                  $finalmerit=15;
                }
                  if($data['benefittype']=='A')
                    {echo '<p align="center"><b><u>'.$uni.' is required to pay 10% Taxes if eligible. </u></b></p>';
                  $finalmerit=10;
                }
$query="INSERT INTO `tax`(`uniqueid`, `income`) VALUES ('".$uni."','".$income."')";
                  $result=mysql_query($query);

                  $query="INSERT INTO `benefitset`(`instituteId`, `uniqueId`, `benefittype`) VALUES ('".$z."','".$uni."','".$finalmerit."')";
                  $result=mysql_query($query);
            }
            else
            {
              echo '<p align="center"><b>You dont belong here</b></p>';
            }



                  //echo '<p align="center">You are Registered. Please <a href="signin.php">Sign-in</a> now!</p>';
         }
    }



  ?>




  <p>
  	<div class="container">
  		 <h2>Tax Benefit Allotment</h2>
  <form class="form-horizontal" name="regForm" method="post" >



    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Unique ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="uni" placeholder="Enter Unique ID" maxlength="10">
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