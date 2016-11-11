<!DOCTYPE html>
<html>
<head>
	<title>
		College-Reservation Portal
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
    if(isset($_POST['merit'])&&isset($_POST['rmerit'])&&isset($_POST['agg'])&&isset($_POST['uni']))
    {
        $merit=$_POST['merit'];
        $rmerit=$_POST['rmerit'];
        $agg=$_POST['agg'];
        $uni=$_POST['uni'];
        $finalmerit=0;
        if(!empty($merit)&&!empty($rmerit)&&!empty($agg)&&!empty($uni))
        {
                  $query="SELECT `benefittype`,`beneselect` FROM `applicantmoreinfo` WHERE `uniqueid`='".$uni."'";
                  $result=mysql_query($query);
                  $data=mysql_fetch_assoc($result);
                  
                  //echo '<p align="center"><b><u>'.$uni.' has been alotted Class '.$data['benefittype'].' benefit. </u></b></p>';

                   
                  //$result=mysql_query($query);
                  if($data['beneselect']=='Education')
            {
                    if($data['benefittype']=='C')
                   { 
                    $finalmerit=$merit*0.8+$rmerit*0.2;
                    if($finalmerit<100&&$finalmerit>0)
                      $finalmerit=50;
                    if($finalmerit<200&&$finalmerit>100)
                      $finalmerit=35;
                    if($finalmerit>200)
                      $finalmerit=20;



                      
                    echo '<p align="center"><b><u>'.$uni.' has been alotted '.$finalmerit.' marks increment in Aggregate Marks. </u></b></p>';}

                  if($data['benefittype']=='B')
                    {
                    $finalmerit=$merit*0.65+$rmerit*0.35;

                    if($finalmerit<100&&$finalmerit>0)
                      $finalmerit=50;
                    if($finalmerit<200&&$finalmerit>100)
                      $finalmerit=35;
                    if($finalmerit>200)
                      $finalmerit=20;
                                        echo '<p align="center"><b><u>'.$uni.' has been alotted '.$finalmerit.' marks increment in Aggregate Marks. </u></b></p>';
                        }
                  if($data['benefittype']=='A')
                    {
                  $finalmerit=$merit*0.50+$rmerit*0.50;

                    if($finalmerit<100&&$finalmerit>0)
                      $finalmerit=50;
                    if($finalmerit<200&&$finalmerit>100)
                      $finalmerit=35;
                    if($finalmerit>200)
                      $finalmerit=20;
                  
                  echo '<p align="center"><b><u>'.$uni.' has been alotted '.$finalmerit.' marks increment in Aggregate Marks. </u></b></p>';

                  $query="INSERT INTO `education`(`uniqueid`, `merit`, `reservemerit`, `aggregate`) VALUES ('".$uni."','".$merit."','".$rmerit."','".$agg."')";
                  $result=mysql_query($query);

                  $query="INSERT INTO `benefitset`(`instituteId`, `uniqueId`, `benefittype`) VALUES ('".$z."','".$uni."','".$finalmerit."')";
                  $result=mysql_query($query);
                    }

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
  <h2>College Admission Allotment</h2>
  <form class="form-horizontal" name="regForm" method="post" >

     <div class="form-group">
      <label class="control-label col-sm-2">Unique ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="mob" maxlength="10" name="uni">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Overall Merit No:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="merit" >
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2">Reservation Merit No:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="rmerit" >
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Aggregate:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="agg" placeholder="out of 500">
      </div>
    </div>
   
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Allot Benefit</button>
      </div>
    </div>

  </form>
</div>
   
</body>
</html>