<!DOCTYPE html>
<html>
<head>
	<title>
		InstituteLogin-Reservation Portal
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


<p align="center">
    <a href="signinstudent.php" class="active"><button type="submit" class="btn btn-default">Applicant Login</button></a>&nbsp;&nbsp;&nbsp;
	<a href="signinins.php" class="active"><button type="submit" class="btn btn-default">Institute Login</button></a>
	</p>

  <?php
    
    require 'connect.php';
    
    if(isset($_POST['instituteId'])&&isset($_POST['password']))
    {
      $insid=$_POST['instituteId'];
      $password=$_POST['password'];

      if(!empty($insid)&&!empty($password))
      { 
          //$password=md5($password);
          $query='SELECT `password` FROM `institution` WHERE `instituteId`=\''.$insid.'\'';
          $result=mysql_query($query);
          //echo $data=mysql_fetch_assoc($result);
          //echo $data['password'];

          if(mysql_num_rows($result)==0)
          {
            echo '<br><p align="center">ID not Registered. Please contact the respective authority now!</p>';
          }
          else if(mysql_num_rows($result)==1)
          {
            $data=mysql_fetch_assoc($result);
            if($password==$data['password'])
            {
              setcookie('loginins',1,time()+36000);
              setcookie('ins', $insid, time()+36000);
              $query='SELECT `type` FROM `institution` WHERE `instituteId`=\''.$insid.'\'';
              $result=mysql_query($query);
              $data=mysql_fetch_assoc($result);
              if($data['type']==1)
              {
                echo '<script>location.href="benefitchkcoll.php"</script>';
              }
              elseif ($data['type']==2) 
              {
                # code...
                echo '<script>location.href="benefitchkloan.php"</script>';
              }
              elseif ($data['type']==3) 
              {
                # code...
                echo '<script>location.href="benefitchktax.php"</script>';
              }
            }
            else
            {
              echo '<br><p align="center">Username and password do not match. Try again</p>';
            }
          }

      }
      else
      {
        echo '<br><p align="center">Fill all the fields properly!</p>';
      }
    }
  ?>

	<div class="container">
  <h2>Institute LogIn:</h2>
  <form class="form-horizontal" method="post">

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Institute ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="instituteId" maxlength="12" placeholder="Enter ID">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-5">
        <input type="password" class="form-control" name="password" placeholder="Enter password">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>