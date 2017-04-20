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
	  <h2 style='text-align : right;'><a href='http://localhost/payroll/Login/index.php'>Logout</a></h2>
    </div>
    <nav>
      <ul>
        <li><div class='dropdown'>
  <button class='dropbtn'>Upload</button>
  <div class='dropdown-content'>
    <a href='http://localhost/payroll/Admin/ad1.php'>Basic Information</a>
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

$url =$_GET["CSV"];
$myfile = fopen($url, "r") or die("Unable to open file!");
while(($fileop = fgetcsv($myfile , ",")) != false )
{
  $Employee_id = $fileop[0];
  $Employee_name = $fileop[1];
  $Designation_id = $fileop[2];
  $Department = $fileop[3];
  $Email_id =  $fileop[4];
  $Address  = $fileop[5];
  $City = $fileop[6];
  $Phone_no  = $fileop[7];
  $Posting_date  = $fileop[8];
  $Basic_Pay = $fileop[9];
  $sql= " Insert into basic_inforamtion values ('$Employee_id','$Employee_name','$Designation_id','$Department','$Email_id','$Address','$City','$Phone_no','$Posting_date','$Basic_Pay')";
  if(mysqli_query($conn, $sql))
{
echo "<h1> Successful in Updating database </h1>";
}
else
{
	echo "Error in  creating " . mysqli_error($conn);	
}
  }
fclose($myfile);
	 echo "<form action='http://localhost/payroll/Admin/ad1.html'>
        <input type='submit' value='Click here to go back'>
     </form> "	;	



?>