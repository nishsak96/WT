<!DOCTYPE html>
<html>
<head>
  <title>
    Reservation Portal
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



    <?php
    include 'connect.php';
    $z=@$_COOKIE['name'];
    //$counter=0;
    if(isset($_POST['address'])&&isset($_POST['income'])&&isset($_POST['memberNo'])&&isset($_POST['beneselect']))
    {
      $flag=0;


      $beneselect=$_POST['beneselect'];

      $address=$_POST['address'];
      $income=$_POST['income'];
      $memberNo=$_POST['memberNo'];

      $img=$_FILES['incomeproof']['name'];
      $imgsize=$_FILES['incomeproof']['size'];
      $imgtype=$_FILES['incomeproof']['type'];

      if(!empty($address)&&!empty($income)&&!empty($memberNo)&&!empty($beneselect)&&!empty($img))
      {
          
          //setcookie('name',3,time()-20);
          //$query="SELECT `UniqueId` FROM `applicantbasic` WHERE `UniqueId`='".$uni."'";
          //$result=mysql_query($query);
          //echo $z;

          /*if(@mysql_num_rows($result)==0||||||||||||||||||$uni!=$z)
          {
            echo '<script>console.log("hello");</script>';
            echo '<script>alert("Id does not exist");</script>';
           echo "<script>location.href='benefitgeneration.php';</script>";
          }

          $query="SELECT `uniqueid` FROM `applicantmoreinfo` WHERE `uniqueid`='".$uni."'";
          $result=mysql_query($query);
          if(mysql_num_rows($result)==1)
          {
            echo '<script>alert("Id already exists")</script>';
            echo "<script>location.href='benefitgeneration.php'</script>";
            die();
          }*/
          echo '<script>console.log("hello1");</script>';
          /*$query="SELECT `PanNo` FROM `applicantmoreinfo` WHERE `PanNo`=".$pan."";
          $result=mysql_query($query);
          $query="SELECT `AadharId` FROM `applicantmoreinfo` WHERE `AadharId`=".$aadhar."";
          $result1=mysql_query($query);*/
          
         // if(@mysql_num_rows($result)==0/*&&@mysql_num_rows($result1)==0*/)
          {
            echo '<script>console.log("hello2");</script>';

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
              echo '<p align="center"><b>This is your Unique Id: <i><u>'.$z.'</u></i></b><br> Please Save it somewhere for future reference</p>';

              $location="images/income/";
              $allowedExts = array("gif", "jpeg", "jpg", "png");
              $tempimg = explode(".",$img);
              $extension = end($tempimg);
              if ((($imgtype == "image/gif")
              || ($imgtype == "image/jpeg")
              || ($imgtype == "image/jpg")
              || ($imgtype == "image/pjpeg")
              || ($imgtype == "image/x-png")
              || ($imgtype == "image/png"))
              && ($imgsize < 1000000)
              && @in_array($extension, $allowedExts))
              {
                @move_uploaded_file($_FILES["photo"]["tmp_name"], $location.$uni.".".$extension);  
              }
              else
              {
                echo '<script>alert("Upload a valid image file under 1MB");</script>';
                echo '<script>location.href="newbenefits.php"</script>';
              }
                    //echo $uni."\n";
                    
                    //$query='INSERT INTO `applicantmoreinfo`(`beneselect`) VALUES (\''.$beneselect.'\''.')';

                    //$result=mysql_query($query);
                    $param=$income/$memberNo;
                    if($param<=62000)
                     {  echo "<script>alert('You got Class A benefit')</script>";
                      $benefittype="A";}
                    if($param<=100000  && $param>62000)
                     {echo "<script>alert('You got Class B benefit')</script>";
                      $benefittype="B";}
                    if($param<=150000 && $param>100000)
                      {echo "<script>alert('You got Class C benefit')</script>";
                      $benefittype="C";}
                    if($param>150000)
                      {echo "<script>alert('You got Class D benefit: NOT ELIGIBLE FOR BENFIT')</script>";
                      $benefittype="D";}

                        $query="UPDATE `applicantmoreinfo` SET `Address`='".$address."',`Income`='".$income."',`Familymembers`='".$memberNo."',`benefittype`='".$benefittype."',`beneselect`='".$beneselect."' WHERE `uniqueid`='".$z."'";

                        $result=mysql_query($query);
                        setcookie('class',$benefittype,time()+36000);

                    //$query='INSERT INTO `applicantmoreinfo`(`benefittype`) VALUES (\''.$benefittype.'\''.')';
                      echo "<script>alert('Congratulations. You can go ahead now.')</script>";
                     //aadharcheck($aadhar);
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
        //if($counter!=0)
        //echo '<p align="center">Fill all the fields properly!</p>';
        echo "<script>alert('Fill all the fields properly')</script>";
        //echo "<script>location.href='registration.php'</script>";
        //header('Location: registration.php');
      }
    }

    

?>


<div class="container">
  <h2>Check Your Benefits</h2>
  <form class="form-horizontal" name="regForm" method="post" enctype="multipart/form-data">

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

     <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Upload Income proof:</label>
        <div class="col-sm-3">
        <input type="file" name="incomeproof" class="form-control">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2">Benefit type you want:</label>  
      <div class="col-sm-5">
        <select class="form-control" name="beneselect">
          <option>Education</option>
          <option>Loan</option>
          <option>Tax</option>
        </select>
      </div>
    </div>
        

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Generate and verify documents</button>
      </div>
    </div>


   

  </form>