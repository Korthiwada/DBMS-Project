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
$User_id = $_GET["User_id"];
$Type = $_GET["Type"];  
$nop = $_GET["nop"];
if($nop == 'Type' )
{
	    echo " <div class ='wrapper row2'>
  <form action='http://localhost/payroll/Admin/ad5311.php'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Update</legend>
	  User_id:<br>
	<select name='User_id'>
	<option>$User_id</option>
	</select>
	<br>
	    Type:<br>
	<select name='Type'>
	<option>$Type</option>
	</select>
    <br><br>
    Enter the new value:<br>
	<select name='type'>
<option>Adminstrator</option>
<option>Operator</option>
<option>Employee</option>
</select>
    <br><br>
    <input type='submit' value='Submit'>
    </fieldset>
   </form>
  </div>" ;
}
else{
	    echo " <div class ='wrapper row2'>
  <form action='http://localhost/payroll/Admin/ad5312.php'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Update</legend>
	    User_id:<br>
	<select name='User_id'>
	<option>$User_id</option>
	</select>
	<br>
	    Type:<br>
	<select name='Type'>
	<option>$Type</option>
	</select>
    <br><br>
    Enter the new value:<br>
	<input type='text' name = 'Password'>
    <br><br>
    <input type='submit' value='Submit'>
    </fieldset>
   </form>
  </div>" ;
}


  
?>