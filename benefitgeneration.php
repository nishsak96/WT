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


<div class="container">
  <h2>Check Your Benefits</h2>
  <form class="form-horizontal" name="regForm" method="post">
     <div class="form-group">
      <label class="control-label col-sm-2">Pan no:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="pan" placeholder="Enter Pan no." maxlength="16" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Aadhar no:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="aadhar" placeholder="Enter Aadhar No" maxlength="16">
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Reserve ID:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="ReserveId" placeholder="Enter Reserve ID" maxlength="16">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Address Line 1:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="Address" placeholder="Enter Address">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Family Income:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" name="income" placeholder="Enter Overall Income in Rupees">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Number of Family Members:</label>
      <div class="col-sm-5">
        <input type="number" class="form-control" id="pwd" placeholder="Enter number of family members:">
      </div>
    </div>

   


     <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Upload Income proof:</label>
        <div class="col-sm-3">
        <input type="file" name="incomeproof" class="form-control">
      </div>
    </div>


        <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Generate and verify documents</button>
      </div>
    </div>

  </form>
</div>
   
   
</body>
</html>