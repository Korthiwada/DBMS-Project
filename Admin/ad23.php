<?php 

echo "<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title>Admin</title>

<link href='style.css' rel='stylesheet' type='text/css' />

</head>
<body>
<div class='wrapper row1'>
  <header id='header' class='clear'>
    <div id='hgroup'>
      <h1><a href='http://localhost/payroll/Login/index.php'>Pay Roll</a></h1>
      <h2>Admin</h2>
    </div>
    <nav>
      <ul>
        <li><div class='dropdown'>
  <button class='dropbtn'>Upload</button>
  <div class='dropdown-content'>
    <a href='http://localhost/payroll/Admin/ad1.html'>Basic Information</a>
	<a href='http://localhost/payroll/Admin/ad6.php'>Designations</a>
    <a href='http://localhost/payroll/Admin/ad2.php'>Credit Parameters</a>
    <a href='http://localhost/payroll/Admin/ad3.php'>Debit Parameters</a>
    <a href='http://localhost/payroll/Admin/ad4.php'>Information of a Particular Employee</a>
    <a href='http://localhost/payroll/Admin/ad5.php'>User</a>
  </div>
</div></li>
        <li class='last'><a href='#'>Pay slip generation</a></li>
      </ul>
    </nav>
  </header> " ;


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

$credit_value = $_GET["Value"];
$credit_name = $_GET["nop"];
$Type = $_GET["Type"];
$designation_id = $_GET["D"];
 if($Type == 'Integer' )
 {
	$T = 1;
 }
  elseif($Type == 'Percentage' )
 {
	$T = 2;
 }
    elseif($Credit_Type == 'Percentage(WITH basic + da )' )
 {
	$T = 3;
 }
$sql = " Update credit_items , credit_parameters Set credit_parameters.Credit_Parameter ='$credit_value' , credit_parameters.Credit_Type = '$T' where credit_items.Credit_id = credit_parameters.Credit_id and credit_items.Credit_name = '$credit_name' and credit_parameters.Designation_type = '$designation_id' " ;
if(mysqli_query($conn, $sql))
{
echo "Successfully updated " ;
}
else
{
	echo "Error using database " . mysqli_error($conn);
	
}
 	echo "<form action='http://localhost/payroll/Admin/ad2.php'>
        <input type='submit' value='Click here to GO BACK'>
     </form> "	;



?>