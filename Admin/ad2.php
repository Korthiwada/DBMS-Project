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
      <h1>Pay Roll</h1>
      <h2>Admin</h2>
	  <<h2 style="text-align : right;"><a href="http://localhost/payroll/Login/index.php">Logout</a></h1>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Admin/ad1.php">Basic Information</a>
	<a href="http://localhost/payroll/Admin/ad6.php">Designations</a>
    <a href="http://localhost/payroll/Admin/ad2.php#">Credit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad3.php">Debit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad4.php">Information of a Particular Employee</a>
    <a href="http://localhost/payroll/Admin/ad5.php">User</a>
  </div>
</div></li>
        <li class="last"><a href="http://localhost/payroll/Admin/ps.php">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad21.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">CSV FILE</legend>
    Upload the desire file:<br>
    <input type="text" name="CSV" required>
    <br><br>
    <input type="submit" value="Submit" required>
  </fieldset>
</form>
</div>
<br><br><br>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad22.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Adding a new Credit_Parameter </legend>
	Type : <br>
    <select name = "type" required>
	<option> Percentage </option>
	<option> Integer </option>
	 <option> Percentage(with Da+ bp)</Option>
	</select>
	<br>
    Name of Parameter : <br>
    <input type="text" name="Credit_Parameter" required>
    <br>
	Value : <br>
<input type="text" name="Value"required>
	<br>
    Designation_Type(if it is same to all type '0(ZERO)') : <br>
<input type="text" name="D" required>
	<br>
    <input type="submit" value="Submit" required>
  </fieldset>
</form>
</div>
<br><br><br>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad23.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Updating a new Credit_Parameter </legend>
    Name of Parameter : <br>
    <select name="nop">
	<?php
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
$sql = "Select Credit_name from Credit_items" ;
$result = mysqli_query($conn, $sql) ;
	while($row = $result->fetch_assoc()) {
	    echo "<option>";
        echo $row["Credit_name"]. "<br>";
        echo "</option>";    
	} 
	
	?>
</select>
   <br>
      Type : <br>
   <select name="Type" required>
   <option> Percentage </option> 
   <option> Integer </Option>
   <option> Percentage(with Da+ bp)</Option>
   </select>
   <br>
   	Value : <br>
   <input type="text" name="Value" required>
   <br>
   Designation_Type(if it is same to all type '0(ZERO)') : <br>
<input type="text" name="D" required>
	<br>
   <input type="submit" value="Submit">
  </fieldset>
  </form>
</div>
  <br><br><br>
  <div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad24.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">	Deleting a Credit_Parameter </legend>
    Name of Parameter : <br>
    <select name="nop1" required>
	<?php

$sql ="use payroll";
if(mysqli_query($conn, $sql))
{
}
$sql = "Select Credit_name from Credit_items" ;
$result = mysqli_query($conn, $sql) ;
	while($row = $result->fetch_assoc()) {
	    echo "<option>";
        echo $row["Credit_name"]. "<br>";
        echo "</option>";    
	} 
	
	?>
</select>
   <br>
   <input type="submit" value="Submit">
  </fieldset>
</form>
</div>

