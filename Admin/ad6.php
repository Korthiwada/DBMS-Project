<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin</title>

<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="http://localhost/payroll/Login/index.php">Pay Roll</a></h1>
      <h2>Admin</h2>
	  <h2 style="text-align : right;"><a href="http://localhost/payroll/Login/index.php">Logout</a></h2>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Admin/ad1.php">Basic Information</a>
	<a href="http://localhost/payroll/Admin/ad6.php">Designations</a>
    <a href="http://localhost/payroll/Admin/ad2.php">Credit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad3.php">Debit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad4.php">Information of a Particular Employee</a>
    <a href="http://localhost/payroll/Admin/ad5.php">User</a>
	
  </div>
</div></li>
        <li class="last"><a href="#">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad61.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">CSV FILE</legend>
    Upload the desire file:<br>
    <input type="text" name="CSV">
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
</div>
<br><br><br>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad62.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Adding a new Designation </legend>
    Name of Designation : <br>
    <input type="text" name="nod">
    <br>
	Designation _Type <br>
<input type="text" name="T">
	<br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
</div>
<br><br><br>
  <div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad63.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">	Delete </legend>
    Name of Designation : <br>
    <select name="nod">
	<?php

$sql ="use payroll";
if(mysqli_query($conn, $sql))
{
}
$sql1 = "Select Designation from designation_table" ;
$result = mysqli_query($conn, $sql1) ;
	while($row = $result->fetch_assoc()) {
	    echo "<option>";
        echo $row["Designation"] ;
        echo "<br>";
        echo "</option>";    
	} 
	?>
</select>
   <br>
   <input type="submit" value="Submit">
  </fieldset>
</form>
</div>

