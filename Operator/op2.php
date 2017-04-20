<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Operator</title>

<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1>Pay Roll</a></h1>
      <h2>Operator </h2>
	  <h2 style="text-align:right"><a href="http://localhost/payroll/Login/index.php">Logout </a></h2>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Operator/op1.php">Basic Information</a>
    <a href="http://localhost/payroll/Operator/op2.php">Credit Parameters</a>
    <a href="http://localhost/payroll/Operator/op3.php">Debit Parameters</a>
    <a href="http://localhost/payroll/Operator/op4.php">Information of a Particular Employee</a>
  </div>
</div></li>
        <li class="last"><a href="#">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Operator/op23.php">
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
   <select name="Type">
   <option> Percentage </option> 
   <option> Integer </Option>
   <option> Percentage(with DA + BP) </option>
   </select>
   <br>
   Designation_Type(if it is same to all type '0(ZERO)') : <br>
   <input type="text" name="D" required>
   <br>
   	Value : <br>
   <input type="text" name="Value" required pattern="[0-9]{1,}" title = "Pattern should be without commas and only of digits">
   <input type="submit" value="Submit">
  </fieldset>
  </form>
</div>
  <br><br><br>
    <div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad34.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">	Deleting a Credit_Parameter </legend>
    Name of Parameter : <br>
    <select name="nop1">
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
