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
$Employee_id = $_POST["Employee_Id"];
$Debit_item = $_POST["Debit_item"];
$Debit_Value = $_POST["Debit_Value"];
$noi = $_POST["noi"];
$interest = $_POST["interest"];
$Type = $_POST["ty"];
$P = $Debit_Value/$noi ;
$sql = "Select Debit_id from debit_items where Debit_item = '$Debit_item' and Debit_Select = '1' ";
$result = mysqli_query($conn,$sql);
	while($row = $result->fetch_assoc()) 
		{
        $Debit_id = $row["Debit_id"];   
	}
$sql = "Insert into debit_informaton_of_a_particular_employee values ('$Employee_id' ,'$Debit_id','$P','$Type','$noi','$interest','$Debit_Value')" ;
if(mysqli_query($conn,$sql))
{
$Mess = "Updated Succefully";
}
else
{
$Mess = "Failed..... Try Again";
}	
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Operator</title>

<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1>Pay Roll</a></h1>
      <h2>Operator</h2>
	  <h2 style="text-align:right"><a href="http://localhost/payroll/Login/index.php">Logout </a></h2>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Operator/op1.php">Basic Information</a>
    <a href="http://localhost/payroll/Operator/op2.php">Credit Parameters</a>
    <a href="http://localhost/payroll/Operator/op3.php">Debit Parameters</a>
	<a href='http://localhost/payroll/Operator/op4.php'>Information of a Particular Employee</a>
  </div>
</div></li>
        <li class="last"><a href="http://localhost/payroll/Operator/ps.php">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
</div>
<div class ='wrapper row2'>
  <?php 
  echo " <h3> $Mess ";
   echo "<form action='http://localhost/payroll/Operator/op4.php'>
        <input type='submit' value='Click here to go back'>
     </form> "	;
?>  