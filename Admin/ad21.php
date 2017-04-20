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
$R=0;
$url =$_GET["CSV"];
$myfile = fopen($url, "r") or die("Unable to open file!");
while(($fileop = fgetcsv($myfile , ",")) != false )
{
  $credit_item = $fileop[0];
  $credit_parameter = $fileop[2];
  $credit_type = $fileop[1] ;
  $designation_type = $fileop[3];
 $n1 ='0' ;
 $n2 ='0' ;
 $sql= "Select Credit_name,Credit_id from credit_items where Credit_name = '$credit_item'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $n1 = 	$row["Credit_name"] ;	
	$n2 = 	$row["Credit_id"] ;
 }
 $Q='0';
 if( $n1 != $credit_item )
 {
 $sql= " Insert into credit_items values (NULL,'$Q','$credit_item')";

  if(mysqli_query($conn, $sql))
{
}
else
{
	echo   mysqli_error($conn);
	
} 
$e = "1889-02-02";
$r = "0";
 $sql= "Select Credit_id from credit_items where Credit_name = '$credit_item'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $r1 = 	$row["Credit_id"] ;	
 }
  $sql= "Insert into credit_parameters values ('$r1' ,'$credit_type','$designation_type','$credit_parameter','$r','$r','$e')" ; 
    if(mysqli_query($conn, $sql))
{
	   	$R = $R + 1 ;
				 $sql= "ALTER TABLE credit
ADD $credit_item int DEFAULT '0'";
$result=mysqli_query($conn, $sql);		
}
else
{
	echo  mysqli_error($conn);
	
}
 }
 else 
 {
	 $q1 = '0';
 $sql= "Select Designation_type from credit_parameters where Credit_id = '$n2'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $q1 = 	$row["Designation_type"] ;	
 }
 $e = "1889-02-02";
$r = "0";
	if($q1 != $designation_type)
  {	
$Q ='1';
    $sql = "Update credit_items set Credit_no = '$Q' where Credit_id = '$n2' ";
    if(mysqli_query($conn, $sql))
{
} 
    $sql= "Insert into credit_parameters values ('$n2' ,'$credit_type','$designation_type','$credit_parameter','$r','$r','$e')" ; 
    if(mysqli_query($conn, $sql))
{
	   	$R = $R + 1 ;
}
else
{
	echo  mysqli_error($conn);
	
} 		 
 }
  }
}
  fclose($myfile);
     echo "<h2>SuccessfulLY Updated $R rows</h2>" ;	
	 echo "<form action='http://localhost/payroll/Admin/ad2.php'>
        <input type='submit' value='Click here to GO BACK'>
     </form> "	;	
?>