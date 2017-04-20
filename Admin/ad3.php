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
      <h1>Pay Roll</a></h1>
      <h2>Admin</h2>
	  <h2 style="text-align : right;"><a href="http://localhost/payroll/Login/index.php">Logout</a></h1>
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
        <li class="last"><a href="http://localhost/payroll/Admin/ps.php">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad31.php">
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
  <form action="http://localhost/payroll/Admin/ad32.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Adding a new Debit_Parameter </legend>
	Select type of Debit_Parameter : <br>
  <input type="radio" name="ty" value="0" checked>Not for a particular Employees 
  <input type="radio" name="ty" value="1"> Particular Employee<br>
	<br>
	Type : <br>
    <select name = "type">
	<option> Percentage </option>
	<option> Integer </option>
	<option> Taxslabs(in Percent) </option>
   <option> Taxslabs(in Integer) </option>
	</select>
	<br>
    Name of Parameter : <br>
    <input type="text" name="Debit_Parameter">
    <br>
	Value : <br>
<input type="text" name="Value">
	<br><br>
	If the Type is Taxslabs then give the range or else give  0 in each slot: <br>
	From: <br>
<input type="text" name="from">
<br>
to: <br>
<input type="text" name="to">
	<br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
</div>
<br><br><br>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad33.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Updating a new Debit_Parameter </legend>
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
$sql = "Select Debit_item from debit_items where Debit_Select = '0'" ;
$result = mysqli_query($conn, $sql) ;
	while($row = $result->fetch_assoc()) {
	    echo "<option>";
        echo $row["Debit_item"]. "<br>";
        echo "</option>";    
	} 
	?>
</select>
   <br>
      Type : <br>
   <select name="Type">
   <option> Percentage </option> 
   <option> Integer </Option>
   <option> Taxslabs(in Percent) </option>
   <option> Taxslabs(in Integer) </option>
   </select>
   <br><br>
	If the Type is Taxslabs then give the range or else give  0 in each slot: <br>
	From: <br>
<input type="text" name="from" required>
<br>
to: <br>
<input type="text" name="to" required>
	<br>
   	Value : <br>
   <input type="text" name="Value" required>
   <input type="submit" value="Submit" required>
  </fieldset>
  </form>
</div>
  <br><br><br>
  <div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad34.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">	Deleting a Debit_Parameter </legend>
    Name of Parameter : <br>
    <select name="nop1">
	<?php

$sql ="use payroll";
if(mysqli_query($conn, $sql))
{
}
$sql = "Select Debit_item from debit_items" ;
$result = mysqli_query($conn, $sql) ;
	while($row = $result->fetch_assoc()) {
	    echo "<option>";
        echo $row["Debit_item"]. "<br>";
        echo "</option>";    
	} 
	
	?>
</select>
   <br>
   <input type="submit" value="Submit">
  </fieldset>
</form>
</div>

