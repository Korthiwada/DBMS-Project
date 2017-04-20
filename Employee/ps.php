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
         echo $Employee_id ?> 
		 </title>
	
<link rel="shortcut icon" href="download.jpg"; />
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
$Month = $_POST["Month"];
$Year = $_POST["Year"];
$sql = "Select Month,Year from Credit where Month = '$Month' and Year = '$Year' ";
$result = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($result);
  if($Month == '1')
{
$Month1 = 'January' ;
}
if($Month == '2')
{
$Month1 = 'February' ;
}
if($Month == '3')
{
$Month1 = 'March' ;
}
if($Month == '4')
{
$Month1 = 'April' ;
}
if($Month == '5')
{
$Month1 = 'May' ;
}
if($Month == '6')
{
$Month1 = 'June' ;
}
if($Month == '7')
{
$Month1 = 'July' ;
}
if($Month == '8')
{
$Month1 = 'August' ;
}
if($Month == '9')
{
$Month1 = 'September' ;
}
if($Month == '10')
{
$Month1 = 'October' ;
}
if($Month == '11')
{
$Month1 = 'Novemmber' ;
}
if($Month == '12')
{
$Month1 = 'December' ;
}
  if($num_rows > '0')
  {

echo"
<div class ='wrapper row2'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Employee_id : $Employee_id <span style='float:right;'>$Month1 $Year</span></legend>
	 <h3 style = 'text-align:center;'>Pay Slip</h3>";
	 $sql = "Select * from basic_inforamtion where Employee_id = '$Employee_id' ";
	 $result = mysqli_query($conn,$sql);
	  while($row = $result->fetch_assoc())
 {
    $Designation_id = $row["Designation_id"];	
    $Employee_name = $row["Employee_name"];
	$Department = $row["Department"];
 }
 	 $sql = "Select * from designation_table where Designation_id = '$Designation_id' ";
	 $result = mysqli_query($conn,$sql);
	  while($row = $result->fetch_assoc())
 {
    $Designation = $row["Designation"];
 }
echo "<br><br>  
   <div class='container-fluid bg-3'>    
  <div class=row'>
    <div class='col-sm-4'>
         <h5 style = 'text-align:center;'> Name   :   $Employee_name </h5> 
	</div>
    <div class='col-sm-4'>	
		 <h5 style = 'text-align:center;'> 		 Designation : $Designation        </h5> 
   </div>
		  <div class='col-sm-4'>
		 <h5 style = 'text-align:center;'>     Department : $Department </h5> </div>    
   <br><br><br><hr>
    <div class='col-sm-6'>
	    <h6 style = 'text-align:center;'> Credits</h6>  
		<p style = 'font-size:130%;'>Item <span style='float:right;'>Rs.</span></p> <br> ";
		$sql = "Select Credit_name from credit_items" ;
 		$result = mysqli_query($conn,$sql) ;
		   while($row = $result->fetch_assoc())
 {
     $Credit_name = $row["Credit_name"];
     $sql1 = "Select $Credit_name from credit where Employee_id = '$Employee_id' and Month = '$Month' and Year = '$Year' ";
 		$result1 = mysqli_query($conn,$sql1) ;	
      while($row1 = $result1->fetch_assoc())
 {	
      $Credit_value = $row1["$Credit_name"];
      echo "<p style = 'font-size:130%;'>$Credit_name : <span style='float:right;'>$Credit_value</span></p> <br>" ;
 }
 }
      
     echo"  </div>   <div class='col-sm-6'>
	    <h6 style = 'text-align:center;'> Debits</h6> 
		<p style = 'font-size:130%;'>Item <span style='float:right;'>Rs.</span></p> <br>" ;
		$sql = "Select Debit_item from debit_items" ;
 		$result = mysqli_query($conn,$sql) ;
		   while($row = $result->fetch_assoc())
 {
     $Debit_item = $row["Debit_item"];
     $sql1 = "Select $Debit_item from debit where Employee_id = '$Employee_id' and Month = '$Month' and Year = '$Year' ";
 		$result1 = mysqli_query($conn,$sql1) ;	
      while($row1 = $result1->fetch_assoc())
 {	
      $Debit_value = $row1["$Debit_item"];
      echo "<p style = 'font-size:130%;'>$Debit_item : <span style='float:right;'>$Debit_value</span></p> <br>" ;
 }
 }		
		
		
	echo "	</div> <hr>
	       <div class='col-sm-4'> ";
	     $sql1 = "Select Total from credit where Employee_id = '$Employee_id' and Month = '$Month' and Year = '$Year' ";
 		$result1 = mysqli_query($conn,$sql1) ;	
      while($row1 = $result1->fetch_assoc())
 {	
      $Credit_value = $row1["Total"];
      echo "<p style = 'font-size:130%;'>Total_Credits : <span style='text-align:center;'>$Credit_value</span></p> <br>" ;
 }
 echo "	</div> 
	       <div class='col-sm-4'> ";
	     $sql1 = "Select Total from debit where Employee_id = '$Employee_id' and Month = '$Month' and Year = '$Year' ";
 		$result1 = mysqli_query($conn,$sql1) ;	
      while($row1 = $result1->fetch_assoc())
 {	
      $Debit_value = $row1["Total"];
      echo "<p style = 'font-size:130%;'>Total_Debits : <span style='text-align:center;'>$Debit_value</span></p> <br>" ;
 }
	echo "	</div> 
	       <div class='col-sm-4'> ";
	$TTL = $Debit_value + $Credit_value ;
	 echo "<p style = 'font-size:130%;'>Net_Pay : <span style='text-align:center;'>$TTL</span></p> <br>" ;
	echo " </div></div>
       <a href='http://localhost/payroll/Employee/ps.php'> <span style='float:right;'>Click Here to go back </span></a> <br><br>";
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
  	<div class='col-sm-2' style='text-align:center' >
	</div>
  <div class='col-md-8'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <strong>
            <span class='glyphicon glyphicon-th'></span>
            <span>Pay Slip</span>
         </strong>
        </div>
    <div class='panel-body'>
	<div class='col-sm-4' style='text-align:center' >
	</div>
	<div class='col-sm-4' style='text-align:center' >
	<form action='http://localhost/payroll/Employee/ps.php' method='post' class='clearfix'>
						 Month: <br>
						 <div class='row'>
                <div class='col-md-15'>
                   <div class='input-group'>
                     <span class='input-group-addon'>
                       <i class='glyphicon glyphicon-usd'></i>
                     </span>
<select name='Month' class='form-control'>
<option value='1'> January </option>
<option value='2'>February </option>
<option value='3'>March </option>
<option value='4'>April </option>
<option value='5'>May</option>
<option value='6'>June </option>
<option value='7'>July </option>
<option value='8'>August </option>
<option value='9'>September </option>
<option value='10'>October </option>
<option value='11'>November </option>
<option value='12'>December </option>
</select>
                     <span class='input-group-addon'>
                     </span>
</div>
</div>
</div>
					 

    Year: <br>
							 <div class='row'>
                <div class='col-md-15'>
                   <div class='input-group'>
                     <span class='input-group-addon' size = 30>
                       <i class='glyphicon glyphicon-usd'></i>
                     </span>
					
<input type='text' name='Year' class='form-control'>
                     <span class='input-group-addon'>
                     </span>
					  </div>
</div>
</div>
       <h4> Pay slip for this month doesnt exists</h4>   
   <input type='submit' value='Submit' class='btn btn-success'> </input>
  </form>
</div>
</div>
</div>
</div> 
</div>
</div>
</div>
 <br> <br><br>" ;
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
  	<div class='col-sm-2' style='text-align:center' >
	</div>
  <div class='col-md-8'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <strong>
            <span class='glyphicon glyphicon-th'></span>
            <span>Pay Slip</span>
         </strong>
        </div>
    <div class='panel-body'>
	<div class='col-sm-4' style='text-align:center' >
	</div>
	<div class='col-sm-4' style='text-align:center' >
	<form action='http://localhost/payroll/Employee/ps.php' method='post' class='clearfix'>
						 Month: <br>
						 <div class='row'>
                <div class='col-md-15'>
                   <div class='input-group'>
                     <span class='input-group-addon'>
                       <i class='glyphicon glyphicon-usd'></i>
                     </span>
<select name='Month' class='form-control'>
<option value='1'> January </option>
<option value='2'>February </option>
<option value='3'>March </option>
<option value='4'>April </option>
<option value='5'>May</option>
<option value='6'>June </option>
<option value='7'>July </option>
<option value='8'>August </option>
<option value='9'>September </option>
<option value='10'>October </option>
<option value='11'>November </option>
<option value='12'>December </option>
</select>
                     <span class='input-group-addon'>
                     </span>
</div>
</div>
</div>
					 

    Year: <br>
							 <div class='row'>
                <div class='col-md-15'>
                   <div class='input-group'>
                     <span class='input-group-addon' size = 30>
                       <i class='glyphicon glyphicon-usd'></i>
                     </span>
					
<input type='text' name='Year' class='form-control'>
                     <span class='input-group-addon'>
                     </span>
					  </div>
</div>
</div>
<br>
          
   <input type='submit' value='Submit' class='btn btn-success'> </input>
  </form>
</div>
</div>
</div>
</div> 
</div>
</div>
</div>
 <br> <br><br>" ;
}
?>	

<footer class="container-fluid text-center">
  <p>Your Pay Is Our Pay</p>
</footer>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>


</body>

</html>