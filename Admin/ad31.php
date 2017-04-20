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
  $debit_item = $fileop[0];
  $debit_parameter = $fileop[1];
  $debit_type = $fileop[2] ;
  $debit_select = $fileop[3];
  $debit_from = $fileop[4] ;
  $debit_to = $fileop[5];
 $n1 ='0' ;
 $sql= "Select Debit_item from debit_items where Debit_item = '$debit_item'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $n1 = 	$row["Debit_item"] ;	
 }

  if ( $debit_select == '0')
 {
 if( $n1 != $debit_item )
 {
 $sql= " Insert into debit_items values (NULL,'$debit_item','$debit_select')";

  if(mysqli_query($conn, $sql))
{
}
else
{
	
} 
$R = "0" ;
$e = "1889-02-02";
$r = "0";
 $sql= "Select Debit_id from debit_items where Debit_item = '$debit_item'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $r1 = 	$row["Debit_id"] ;	
 }
  $sql= "Insert into debit_parameters values ('$r1' ,'$debit_type','$debit_parameter','$debit_from','$debit_to')" ; 
    if(mysqli_query($conn, $sql))
{
	   	$R = $R + 1 ;
	 $sql= "ALTER TABLE debit
ADD $debit_item int DEFAULT '0'";
$result=mysqli_query($conn, $sql);
}
else
{
	
}
 }
 else {
	  echo $n1;
	  echo "<br>";
 echo $debit_item;
 $q1 ='0';
 $e = "1889-02-02";
$r = "0";
 $sql= "Select Debit_id from debit_items where Debit_item = '$debit_item'" ;
 $result = mysqli_query($conn, $sql);
 while($row = $result->fetch_assoc())
 {
    $r1 = 	$row["Debit_id"] ;	
 }
  $sql= "Insert into debit_parameters values ('$r1' ,'$debit_type','$debit_parameter','$debit_from','$debit_to')" ; 
    if(mysqli_query($conn, $sql))
{
   $R=$R + 1; 
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
$sql= " Insert into debit_items values (NULL,'$debit_item','$debit_select')";

  if(mysqli_query($conn, $sql))
{
	$R =$R + 1;
$sql= "ALTER TABLE debit
ADD $debit_item int DEFAULT '0'";
$result=mysqli_query($conn, $sql);
}
}
  }
fclose($myfile);
     echo "<h2>SuccessfulLY Updated $R rows</h2>" ;	
	 echo "<form action='http://localhost/payroll/Admin/ad3.php'>
        <input type='submit' value='Click here to GO BACK'>
     </form> "	;	
?>