
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



 $Employee_id = $_GET["Employee_id"];
 $Employee_name = $_GET["Employee_name"];
 $Designation_id = $_GET["Designation_id"];
 $Department = $_GET["Department"];
 $Email_id =  $_GET["Email_id"];
 $Address  = $_GET["Address"];
 $City = $_GET["City"];
 $Phone_no  = $_GET["Phone_no"];
 $Posting_date  = $_GET["Posting_date"];
 $Basic_Pay = $_GET["Basic_Pay"];
 $sql= " Insert into basic_inforamtion values ('$Employee_id','$Employee_name','$Designation_id','$Department','$Email_id','$Address','$City','$Phone_no','$Posting_date','$Basic_Pay')";
  if(mysqli_query($conn, $sql))
{
echo "SUCCESSFULL";
}
else
{
	echo "Error using database " . mysqli_error($conn);
	
}
	 echo "<form action='http://localhost/payroll/Operator/op1.php'>
        <input type='submit' value='Click here to return to operator page'>
     </form> "	;	
?>