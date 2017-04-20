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


$n1 = '0' ;
$n2 = '0' ;
 $Debit_Parameter = $_GET["Debit_Parameter"];
 $Debit_Value = $_GET["Value"];
 $Debit_Type = $_GET["type"];
 $Debit_Select = $_GET["ty"];
 $Debit_from = $_GET["from"];
 $Debit_to = $_GET["to"];
 if($Debit_Type == 'Integer' )
 {
	$T = 1;
 }
  elseif($Debit_Type == 'Percentage' )
 {
	$T = 2;
 }
    elseif($Debit_Type == 'Taxslabs(in Percent)' )
 {
	$T = 3;
 }
     elseif($Debit_Type == 'Taxslabs(in Integer)' )
 {
	$T = 4;
 }
 if ($Debit_Select == '0')
 {
 $sql= "Select Debit_item from debit_items where Debit_item = '$Debit_Parameter'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $n1 = 	$row["Debit_item"] ;	
 }
 if( $n1 != $Debit_Parameter )
 {
 $sql= " Insert into debit_items values (NULL,'$Debit_Parameter','$Debit_Select')";

  if(mysqli_query($conn, $sql))
{
}
else
{
	echo   mysqli_error($conn);
	
} 
$R = "0" ;
$e = "1889-02-02";
$r = "0";
 $sql= "Select Debit_id from debit_items where Debit_item = '$Debit_Parameter'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $r1 = 	$row["Debit_id"] ;	
 }
  $sql= "Insert into debit_parameters values ('$r1' ,'$T','$Debit_Value','$Debit_from','$Debit_to')" ; 
    if(mysqli_query($conn, $sql))
{
	$R = $R + 1 ;
	$sql= "ALTER TABLE debit
ADD $Debit_Parameter int DEFAULT '0'";
$result=mysqli_query($conn, $sql);
}
else
{
	echo  mysqli_error($conn);
	
}
   echo "<h2>SuccessfulLY Updated $R rows</h2>" ;	
 }
 
 else 
 {
  $q1 ='0';
 $e = "1889-02-02";
$r = "0";
 $sql= "Select Debit_id from debit_items where Debit_item = '$Debit_Parameter'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $r1 = 	$row["Debit_id"] ;	
 }
  $sql= "Insert into debit_parameters values ('$r1' ,'$T','$Debit_Value','$Debit_from','$Debit_to')" ; 
    if(mysqli_query($conn, $sql))
{
	echo "<h1> Successfully created </h1> ";
}
else
{
     echo "<h1 style='color:red;'>      - -Your Parameter exists- - </h1> " ;
		echo "so just update the value instead of creating it again........" ;
 } 
 }
 }
else
{
$sql= " Insert into debit_items values (NULL,'$Debit_Parameter','$Debit_Select')";

  if(mysqli_query($conn, $sql))
{
	echo "<h1> Successfully created </h1> ";
	$sql= "ALTER TABLE debit
ADD $Debit_Parameter int DEFAULT '0'";
$result=mysqli_query($conn, $sql);
}
}
 echo "<form action='http://localhost/payroll/Admin/ad3.php'>
        <input type='submit' value='Click here to GO BACK'>
     </form> "	;
?>