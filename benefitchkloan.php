<!DOCTYPE html>
<html>
<head>
	<title>
		Loans-Reservation Portal
	</title>


	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bodyelements.css">
</head>


<body>
<?php
  /*  require 'connect.php';

    
    if(isset($_POST['id'])&&isset($_POST['amount'])&&isset($_POST['name']))
    {
      $flag=0;
      echo $id=$_POST['id'];
      echo $amount=$_POST['amount'];
      echo $name=$_POST['name'];
      
      
      echo $query="SELECT `benefittype` FROM `applicantmoreinfo` WHERE `uniqueid`='".$id."'";
      $result=mysql_query($query);

      //echo $result;
      while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    print_r($row);}
      

     }     
      else
      {
        //echo '<p align="center">Fill all the fields properly!</p>';
        echo "<script>alert('Fill all the fields properly')</script>";
        //echo "<script>location.href='registration.php'</script>";
        //header('Location: registration.php');
      }

    

  */?>

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
    if(isset($_POST['amount'])&&isset($_POST['name'])&&isset($_POST['uni']))
    {
       $amt=$_POST['amount'];
       $name=$_POST['name'];
       $uni=$_POST['uni'];
       $finalmerit=0;

        if(!empty($amt)&&!empty($name)&&!empty($uni))
        {
                  $query="SELECT `benefittype`,`beneselect` FROM `applicantmoreinfo` WHERE `uniqueid`='".$uni."'";
                  $result=mysql_query($query);
                  $data=mysql_fetch_assoc($result);
                  
                    if($data['beneselect']=='Loan')
            {

                   
                  if($data['benefittype']=='C')
                   { echo '<p align="center"><b><u>'.$uni.' has been alotted 10% Interest. </u></b></p>';
                  $finalmerit=10;}
                  if($data['benefittype']=='B')
                    {echo '<p align="center"><b><u>'.$uni.' has been alotted 7% Interest. </u></b></p>';
                  $finalmerit=7;
                }
                  if($data['benefittype']=='A')
                    {echo '<p align="center"><b><u>'.$uni.' has been alotted 5% Interest. </u></b></p>';
                  $finalmerit=7;
                }

                  $query="INSERT INTO `loans`(`uniqueid`, `amount`, `refname`) VALUES ('".$uni."','".$amt."','".$name."')";
                  $result=mysql_query($query);

                  $query="INSERT INTO `benefitset`(`instituteId`, `uniqueId`, `benefittype`) VALUES ('".$z."','".$uni."','".$finalmerit."')";
                  $result=mysql_query($query);
                    //echo '<p align="center"><b><u>'.$uni.' has been alotted 5% Interest. </u></b></p>';
            }
           else
            {
              echo '<p align="center"><b>You dont belong here</b></p>';
            } 

                  //echo '<p align="center">You are Registered. Please <a href="signin.php">Sign-in</a> now!</p>';
         }
    }



  ?>

<div class="container">
  <h2>Bank Loan Benefit Allotment</h2>
  <form class="form-horizontal" name="regForm" method="post" action="#">

    <div class="form-group">
      <label class="control-label col-sm-2" >Unique ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="uni" placeholder="Enter Unique ID" maxlength="10">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Loan Amount:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="amount" placeholder="Enter Amount in Rupees">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Reference Name:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="name" placeholder="Enter Reference name">
      </div>
    </div>
   
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" >Allot Benefit</button>
      </div>
    </div>


  </form>
</div>
</body>
</html>