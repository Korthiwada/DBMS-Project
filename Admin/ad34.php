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
	echo "Error using database  " . mysqli_error($conn);
	
}

$Debit_name = $_GET["nop1"];
$sql = "Select Debit_Select from debit_items where Debit_item = '$Debit_name'";
$result = mysqli_query($conn,$sql);
	while($row = $result->fetch_assoc()) 
		{

        $r1=$row["Debit_Select"];   
	}
	if($r1 == '0')
	{
$sql = " Delete debit_items,debit_parameters from debit_items inner join debit_parameters where debit_items.Debit_id = debit_parameters.Debit_id and debit_items.Debit_item = '$Debit_name' " ;
if(mysqli_query($conn, $sql))
{
echo "Successfully updated " ;
$sql= "ALTER TABLE debit
DROP COLUMN $Debit_name  ";
$result=mysqli_query($conn, $sql);
}
else
{
	echo "Error updating " . mysqli_error($conn);
	
}
	}
	elseif( $r1 == '1')
	{
		$sql = " Delete debit_items,debit_informaton_of_a_particular_employee from debit_items inner join debit_informaton_of_a_particular_employee where debit_items.Debit_id = debit_informaton_of_a_particular_employee.Debit_id and debit_items.Debit_item = '$Debit_name' " ;
if(mysqli_query($conn, $sql))
{
echo "Successfully updated " ;
$sql= "ALTER TABLE debit
DROP COLUMN $Debit_name  ";
$result=mysqli_query($conn, $sql);
}
else
{
	echo "Error updating " . mysqli_error($conn);
	
}
	}
 	echo "<form action='http://localhost/payroll/Admin/ad3.php'>
        <input type='submit' value='Click here to GO BACK'>
     </form> "	;



?>