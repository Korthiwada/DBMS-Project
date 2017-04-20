<?php

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
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="http://localhost/payroll/Login/index.php">Pay Roll</a></h1>
      <h2>Admin</h2>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Admin/ad1.html">Basic Information</a>
	<a href="http://localhost/payroll/Admin/ad6.php">Designations</a>
    <a href="http://localhost/payroll/Admin/ad2.php">Credit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad3.php">Debit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad4.php">Information of a Particular Employee</a>
    <a href="http://localhost/payroll/Admin/ad5.php">User</a>
  </div>
</div></li>
        <li class="last"><a href="http://localhost/payroll/Admin/ps.php">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
<?php
$Employee_id = $_POST["Employee_id"];
$Month = $_POST["Month"];
$Year = $_POST["Year"];
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
		<p style = 'color:white;font-size:130%;'>Item <span style='float:right;'>Rs.</span></p> <br> ";
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
      echo "<p style = 'color:white;font-size:130%;'>$Credit_name : <span style='float:right;'>$Credit_value</span></p> <br>" ;
 }
 }
      
     echo"  </div>   <div class='col-sm-6'>
	    <h6 style = 'text-align:center;'> Debits</h6> 
		<p style = 'color:white;font-size:130%;'>Item <span style='float:right;'>Rs.</span></p> <br>" ;
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
      echo "<p style = 'color:white;font-size:130%;'>$Debit_item : <span style='float:right;'>$Debit_value</span></p> <br>" ;
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
	echo " </div></div>" ;
		
 











?>
<footer class="container-fluid text-center">
</footer>
