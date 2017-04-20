<?php
session_start();



$Employee_Id = $_SESSION["Employee_id"];
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

if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {   
  if (isset($_POST['Publish1'])) {
	   $Address = $_POST["Address"] ;
$sql = " Update basic_inforamtion Set Address ='$Address' where  Employee_id='$Employee_Id' " ;
if(mysqli_query($conn, $sql))
{
$Status = "Successfully updated " ;
}
else
{
$Status = "Error in Updating ....Try again ...  " ;
	
}
    }
    elseif (isset($_POST['Publish2'])) {
	   $Phone_no = $_POST["Phone_no"] ;
$sql = " Update basic_inforamtion Set Phone_no ='$Phone_no' where  Employee_id='$Employee_Id' " ;
if(mysqli_query($conn, $sql))
{
$Status = "Successfully updated " ;
}
else
{
$Status = "Error in Updating ....Try again ...  " ;
	
}  
    }  
    elseif (isset($_POST['Publish3'])) {
	   $Email_id = $_POST["Email"] ;
$sql = " Update basic_inforamtion Set Email_id ='$Email_id' where  Employee_id='$Employee_Id' " ;
if(mysqli_query($conn, $sql))
{
$Status = "Successfully updated " ;
}
else
{
$Status = "Error in Updating ....Try again ...  " ;
	
}  
    } 
    elseif (isset($_POST['Publish4'])) {
	   $City = $_POST["City"] ;
$sql = " Update basic_inforamtion Set City ='$City' where  Employee_id='$Employee_Id' " ;
if(mysqli_query($conn, $sql))
{
$Status = "Successfully updated " ;
}
else
{
$Status = "Error in Updating ....Try again ...  " ;
	
}
       
    } 
			  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php
         echo $Employee_Id ?></title>
		 <link rel="shortcut icon" href="download.jpg"; />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://localhost/payroll/Employee/css/1.css">
  <script src="http://localhost/payroll/Employee/css/1.js"></script>
  <script src="http://localhost/payroll/Employee/css/2.js"></script>
  <style>

    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /*Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
 </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" >
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Payroll</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav">
        <li><a href="http://localhost/payroll/Employee/ps.php">Pay Slip</a></li>
        <li><a href="http://localhost/payroll/Employee/pl.php">Personal Loans</a></li>
        <li><a href="http://localhost/payroll/Employee/U.php">Updating Information</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="http://localhost/payroll/Employee/pd.php">Personal Details</a></li>
	    <li><a href="http://localhost/payroll/Employee/cp.php">Change Password</a></li>
        <li><a href="http://localhost/payroll/Employee/index.php"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron" style="background-image: url(payroll-clipart-payroll.jpg);background-repeat : no-repeat ;background-position: center;">
  <div class="container text-center" style=" height: 250px; width: 150%;">
    <h1></h1>      
    <p></p>
  </div>
</div>
  <div class='row'>
  	<div class='col-sm-2' style='text-align:center' >
	</div>
  <div class='col-md-12'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <strong>
            <span class='glyphicon glyphicon-th'></span>
            <span>Updating Information</span>
         </strong>
        </div> 
		    <div class='panel-body'>
    <div class="col-sm-3">
	<form action="http://localhost/payroll/Employee/U.php" method='post'> 
    <h3> Address </h3>
    <input type="text" name="Address" class='form-control' placeholder = 'Address'>
    <br>
	<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {
				    if (isset($_POST['Publish1'])) {
					echo "<h4 style='color:green ;' > $Status </h4> <br>"; }
			  }
			  ?>
	
     <input type="submit" value="Submit" name="Publish1" class='btn btn-success'>
  <br>
     </form>
	    </div>
    <div class="col-sm-3"> 
	<form action="http://localhost/payroll/Employee/U.php" method='post'>
	<h3> Phone No </h3>
    <input type="text" name="Phone_no" class='form-control' placeholder = 'Phone No' pattern="[0-9]{10}" title="Invalid-Format">
    <br>
		<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {   if (isset($_POST['Publish2'])) {
			  echo "<h4 style='color:green ;' > $Status </h4> $Status <br>"; }
			  }
			  ?>
			  
     <input type="submit" value="Submit" name="Publish2" class='btn btn-success'>
  <br>
     </form>
	    </div>
    <div class="col-sm-3"> 

	<form action="http://localhost/payroll/Employee/U.php" method='post'>
		<h3> Email </h3>
    <input type="text" name="Email" class='form-control' placeholder = 'Email' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" title="Email Format">
    <br>
		<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {  if (isset($_POST['Publish3'])) {
			  echo "<h4 style='color:green ;' > $Status </h4><br> ";}
			  }
			  ?>
			 
     <input type="submit" value="Submit" name="Publish3" class='btn btn-success'>
  <br>
     </form>
	    </div>
    <div class="col-sm-3"> 
	<form action="http://localhost/payroll/Employee/U.php" method='post'>
	<h3> City </h3> 
    <input type="text" name="City" class='form-control' placeholder = 'City' pattern="[A-za-z]{0,}" title="Should contain only Alphabets">
    <br>
		<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {  if (isset($_POST['Publish4'])) {
			  echo "<h4 style='color:green ;' > $Status </h4><br>"; }
			  }
			  ?>
			  
     <input type="submit" value="Submit" name="Publish4" class='btn btn-success' >
  <br>
     </form>
</div> 
</div>
</div>
</div>
</div>
 <br><br><br><br><br>
<footer class="container-fluid text-center">
  <p>Your Pay Is Our Pay</p>
</footer>

</body>
</html>

 