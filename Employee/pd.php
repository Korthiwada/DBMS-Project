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
	   $Email_id = $_POST["Email_id"] ;
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
         echo $Employee_id ?></title>
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
  	<div class='col-sm-3'  >
	</div>
  <div class='col-md-6'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <strong>
            <span class='glyphicon glyphicon-th'></span>
            <span>Personal Information</span>
         </strong>
        </div> 
		<div class='panel-body'>
			<div class='col-sm-12' > 
<?php	
  $sql = "Select * from basic_inforamtion where Employee_id = '$Employee_id'";
   $result = mysqli_query($conn,$sql);
   $num_rows = mysqli_num_rows($result);   
   if($num_rows > '0')
  {     
	 while( $row = $result->fetch_assoc())
	  {
         $Employee_name = $row["Employee_name"] ;
         $Designation_id = $row["Designation_id"];
         $Department = $row["Department"];
		 $Email_id = $row["Email_id"];
		 $Address = $row["Address"];
		 $City = $row["City"];
		 $Phone_no = $row["Phone_no"];
		 $Basic_Pay = $row["Basic_Pay"];
		 $sql1 = "Select * from designation_table where Designation_id = '$Designation_id'";
         $result1 = mysqli_query($conn,$sql1);
		 while( $row1 = $result1->fetch_assoc())
	  {
		 $Designation = $row1["Designation"] ; 
	  }
	  echo "<hr><p style = 'font-size:130%;'>  Name : $Employee_name <br> Designation : $Designation <br> Department : $Department <br> Phone No : $Phone_no <br> 
            Email id : $Email_id <br> Address : $Address <br> City : $City	  </p> ";  
      }	
  }	  
?>	  
</div></div></div></div></div> <br><br><br><br>
<footer class="container-fluid text-center">
  <p>Your Pay Is Our Pay</p>
</footer>

</body>
</html>
