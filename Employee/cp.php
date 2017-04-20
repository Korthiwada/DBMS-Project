<?php
session_start();




$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql ="use payroll";
if(mysqli_query($conn, $sql))
{
}
else
{
	echo "Error using database " . mysqli_error($conn);
	
} 
$Employee_id = $_SESSION["Employee_id"];
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title><?php 
         echo $Employee_id ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://localhost/payroll/Employee/css/1.css">
  <script src="http://localhost/payroll/Employee/css/1.js"></script>
  <script src="http://localhost/payroll/Employee/css/2.js"></script>
  <style>
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">



<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$OP = $_POST["op"];
$NP = $_POST["np"];
$sql = "Select * from user where Employee_id = '$Employee_id' and Password = '$OP' and User_Type = '3' ";
$result = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($result);
  if($num_rows > '0')
  {

	echo " 
	<nav class='navbar navbar-inverse navbar-fixed-top'>
  <div class='container-fluid' >
    <div class='navbar-header' >
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>                        
      </button>
      <a class='navbar-brand' href='#'>Payroll</a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar' >
      <ul class='nav navbar-nav'>
        <li><a href='http://localhost/payroll/Employee/ps.php'>Pay Slip</a></li>
        <li><a href='http://localhost/payroll/Employee/pl.php'>Personal Loans</a></li>
        <li><a href='http://localhost/payroll/Employee/U.php'>Updating Information</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
        <li><a href='http://localhost/payroll/Employee/index.php'><span class='glyphicon glyphicon-log-in'></span> Logout </a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class='jumbotron' style='background-image: url(payroll-clipart-payroll.jpg);background-repeat : no-repeat ;background-position: center;'>
  <div class='container text-center' style=' height: 250px; width: 150%;'>
    <h1></h1>      
    <p></p>
  </div>
</div>
	<div class='col-sm-12' style='text-align:center'> ";
	$sql = "Update user set Password = '$NP' where Employee_id = '$Employee_id' and Password = '$OP' and User_Type = '3' " ;
 if (mysqli_query($conn,$sql) > 0 )
 {
	echo "<h4> Password updated successfully </h4> " ;
 }		
}
else
{
	echo " 
	<nav class='navbar navbar-inverse navbar-fixed-top'>
  <div class='container-fluid' >
    <div class='navbar-header' >
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>                        
      </button>
      <a class='navbar-brand' href='#'>Payroll</a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar' >
      <ul class='nav navbar-nav'>
        <li><a href='http://localhost/payroll/Employee/ps.php'>Pay Slip</a></li>
        <li><a href='http://localhost/payroll/Employee/pl.php'>Personal Loans</a></li>
        <li><a href='http://localhost/payroll/Employee/U.php'>Updating Information</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
	    <li><a href='http://localhost/payroll/Employee/pd.php'>Personal Details</a></li>
		<li><a href='http://localhost/payroll/Employee/cp.php'>Change Password</a></li>
        <li><a href='http://localhost/payroll/Employee/index.php'><span class='glyphicon glyphicon-log-in'></span> Logout </a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class='jumbotron' style='background-image: url(payroll-clipart-payroll.jpg);background-repeat : no-repeat ;background-position: center;'>
  <div class='container text-center' style=' height: 250px; width: 150%;'>
    <h1></h1>      
    <p></p>
  </div>
</div>
      <div class='row'>
  	<div class='col-sm-3' style='text-align:center' >
	</div>
  <div class='col-md-6'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <strong>
            <span class='glyphicon glyphicon-th'></span>
            <span>Change Password</span>
         </strong>
        </div> 
		<div class='panel-body'>
			<div class='col-sm-3' style='text-align:center' >
	</div>
	<div class='col-sm-6' style='text-align:center'> 
	<form action='http://localhost/payroll/Employee/cp.php' method='post'>
	Old Password : <br>
<input type='text' name='op' class='form-control'>
<br>    
 New Password: <br>
<input type='text' name='np' class='form-control' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters'>
<br>
   <h4 style='color:red;'> Password doesn't match .....<br> Try Again</h4>
   <input type='submit' value='Submit' class='btn btn-success'>
  </form>
</div></div></div></div></div>
    <br> <br><br><br><br>" ;
}
}
else
{
	echo " 
	<nav class='navbar navbar-inverse navbar-fixed-top'>
  <div class='container-fluid' >
    <div class='navbar-header' >
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>                        
      </button>
      <a class='navbar-brand' href='#'>Payroll</a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar' >
      <ul class='nav navbar-nav'>
        <li><a href='http://localhost/payroll/Employee/ps.php'>Pay Slip</a></li>
        <li><a href='http://localhost/payroll/Employee/pl.php'>Personal Loans</a></li>
        <li><a href='http://localhost/payroll/Employee/U.php'>Updating Information</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
	    <li><a href='http://localhost/payroll/Employee/pd.php'>Personal Details</a></li>
	    <li><a href='http://localhost/payroll/Employee/cp.php'>Change Password</a></li>
        <li><a href='http://localhost/payroll/Employee/index.php'><span class='glyphicon glyphicon-log-in'></span> Logout </a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class='jumbotron' style='background-image: url(payroll-clipart-payroll.jpg);background-repeat : no-repeat ;background-position: center;'>
  <div class='container text-center' style=' height: 250px; width: 150%;'>
    <h1></h1>      
    <p></p>
  </div>
</div>
      <div class='row'>
  	<div class='col-sm-3' style='text-align:center' >
	</div>
  <div class='col-md-6'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <strong>
            <span class='glyphicon glyphicon-th'></span>
            <span>Change Password</span>
         </strong>
        </div> 
		<div class='panel-body'>
			<div class='col-sm-3' style='text-align:center' >
	</div>
	<div class='col-sm-6' style='text-align:center'> 
	<form action='http://localhost/payroll/Employee/cp.php' method='post'>
	Old Password : <br>
<input type='text' name='op' class='form-control'>
<br>    
 New Password: <br>
<input type='text' name='np' class='form-control' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters'>
<br>
   <input type='submit' value='Submit' class='btn btn-success'>
  </form>
</div></div></div></div></div>

    <br> <br><br><br><br>" ;
}
?>	

<footer class="container-fluid text-center">
  <p>Your Pay Is Our Pay</p>
</footer>

</body>

</html>