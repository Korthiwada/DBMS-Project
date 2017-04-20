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
if(strcmp($Type , "Adminstrator" ) == 0 )
  { 
     $T = 1 ;
  }  
  elseif(strcmp($Type , "Operator" ) == 0 )
  {
     $T =2 ;
  }
  else 
  {
     $T = 3;		 
  }

$sql = "Select Employee_id from user where Employee_id = '$User_id' and User_Type = '$T' ";
$result = mysqli_query($conn, $sql);
if(mysqli_query($conn, $sql))
{
}
else
{
	echo "Error using database  " . mysqli_error($conn);
	
}
$num_rows = mysqli_num_rows($result);
  if($num_rows > 0)
  {
    echo " <div class ='wrapper row2'>
  <form action='http://localhost/payroll/Admin/ad531.php'>
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
	    Select the parameter to be updated:<br>
    <select name='nop'>
	<option>Type</option>
	<option>Password</option>
	</select>
    <br><br>
    <input type='submit' value='Submit'>
    </fieldset>
   </form>
  </div>  "  ;
  }
  else
  {
	  echo "<h1 style = 'color : red' >--------User_Id doesn't exixts -------------- </h1>" ;
	   	echo "<form action='http://localhost/payroll/Admin/ad5.php'>
        <input type='submit' value='Click here to go back'>
     </form> "	;
  }















?>