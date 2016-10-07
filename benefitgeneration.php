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
	    				<li><a href="HomeLayout.html">Back to Home</a></li>
	    			</ul>
	    		</div>
	    	</div>
	    </div>
   </div>



    <?php
    include 'connect.php';

    if(isset($_POST['uniqueId'])&&isset($_POST['pan'])&&isset($_POST['aadhar'])&&isset($_POST['reserveId'])&&isset($_POST['address'])&&isset($_POST['income'])&&isset($_POST['memberNo']))
    {
      $flag=0;
      $pan=$_POST['pan'];
      $aadhar=$_POST['aadhar'];
      $reserveId=$_POST['reserveId'];
      $address=$_POST['address'];
      $income=$_POST['income'];
      $memberNo=$_POST['memberNo'];
      $uni=$_POST['uniqueId'];
      if(!empty($pan)&&!empty($aadhar)&&!empty($reserveId)&&!empty($address)&&!empty($income)&&!empty($memberNo)&&!empty($uni))
      {
          $query="SELECT `UniqueId` FROM `applicantbasic` WHERE `UniqueId`='".$uni."'";
          $result=mysql_query($query);
          if(@mysql_num_rows($result)==0)
          {
            echo '<script>alert("Id does not exist")</script>';
            echo "<script>location.href='benefitgeneration.php'</script>";
            die();
          }

          $query="SELECT `uniqueid` FROM `applicantmoreinfo` WHERE `uniqueid`='".$uni."'";
          $result=mysql_query($query);
          if(mysql_num_rows($result)==1)
          {
            echo '<script>alert("Id already exists")</script>';
            echo "<script>location.href='benefitgeneration.php'</script>";
            die();
          }

          $query="SELECT `PanNo` FROM `applicantmoreinfo` WHERE `PanNo`=".$pan."";
          $result=mysql_query($query);
          $query="SELECT `AadharId` FROM `applicantmoreinfo` WHERE `AadharId`=".$aadhar."";
          $result1=mysql_query($query);
          
          if(@mysql_num_rows($result)==0&&@mysql_num_rows($result1)==0)
          {

            /*if(strlen($memberNo)!=10)
            {
              //echo '<p align="center">Enter only 10 digits</p>';
              echo "<script>document.regForm.pan.value='".$pan."'</script>";
              echo "<script>document.regForm.aadhar.value=".$aadhar."</script>";
              echo "<script>document.regForm.reserveId.value=".$reserveId."</script>";
              
            }
            if($address<8 && $income<8)
            {
              //echo '<p align="center">Enter atleast 8  characters</p>';
              echo "<script>document.regForm.pan.value=".$pan."</script>";
              echo "<script>document.regForm.aadhar.value=".$aadhar."</script>";
              echo "<script>document.regForm.memberNo.value=".$memberNo."</script>";
              echo "<script>document.regForm.reserveId.value=".$reserveId."</script>";
            }
            else{*/

           

                  //if($address==$income)
                  //{
                    //$address=sha1($address);
                    $flag=1;
                    //$uni=strtolower($uni=substr($pan,0,1).substr($aadhar,0,1).substr($reserveId,0,1).substr($address,16,5).substr($memberNo,1,2));
                    //echo '<p align="center"><b>This is your Unique Id: <i><u>'.$uni.'</u></i></b><br> Please Save it somewhere for future reference</p>';
                    //echo $uni."\n";
                    $query='INSERT INTO `applicantmoreinfo`(`uniqueid`,`PanNo`, `AadharId`, `reserveId`, `Address`,`Income`,`Familymembers`) VALUES (\''.$uni.'\',\''.$pan.'\',\''.$aadhar.'\',\''.$reserveId.'\',\''.$address.'\',\''.$income.'\',\''.$memberNo.'\''.')';
                    $result=mysql_query($query);
                     echo "<script>alert('Congratulations. You can go ahead now.')</script>";
                     echo "<script>location.href='portal.php'</script>";

                   /* if(@$flag==1)
                    {
                      echo '<script>function dddd(){document.getElementById("abc").onclick = location.href="benefitgeneration.php";}</script>';
                      echo "<div class='col-sm-offset-5 col-sm-12'><button type='button' class='btn btn-default' id='abc' onclick='dddd()'>Next >></button></div>";
                    }
                    //echo '<p align="center">You are Registered. Please <a href="signin.php">Sign-in</a> now!</p>';
                  }
                  else
                  {
                    //echo '<p align="center">addresss do not match</p>';
                    echo "<script>alert('addresss do not match.')</script>";
                    echo "<script>location.href='registration.php'</script>";
                  }*/

          }
        }
        else
        {
          echo "<script>alert('Pan or Aadhar number already exists.')</script>";
        }


      }
      else
      {
        //echo '<p align="center">Fill all the fields properly!</p>';
        echo "<script>alert('Fill all the fields properly')</script>";
        //echo "<script>location.href='registration.php'</script>";
        //header('Location: registration.php');
      }
  ?> 


<div class="container">
  <h2>Check Your Benefits</h2>
  <form class="form-horizontal" name="regForm" method="post">

   <div class="form-group">
      <label class="control-label col-sm-2" >Unique ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="uniqueId" placeholder="Enter uniqueid again" maxlength="10">
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2">Pan no:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="pan" placeholder="Enter 16 digit Pan no." maxlength="16" >
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" >Aadhar no:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="aadhar" placeholder="Enter 16 digit Aadhar No" maxlength="16">
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2" >Reserve ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="reserveId" placeholder="Enter 10 character Reserve ID" maxlength="10">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Address:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="address" placeholder="Enter Address">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Family Income:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="income" placeholder="Enter Overall Income in Rupees">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2">Number of Family Members:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="memberNo" placeholder="Enter number of family members:">
      </div>
    </div>

   


     <!--<div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Upload Income proof:</label>
        <div class="col-sm-3">
        <input type="file" name="incomeproof" class="form-control">
      </div>
    </div>-->


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Generate and verify documents</button>
      </div>
    </div>


   

  </form>
</div>
   

</form>
   
</body>
</html>