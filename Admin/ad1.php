<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin</title>

<link href="style.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="http://localhost/payroll/Admin/index.html">Pay Roll</a></h1>
      <h2>Admin</h2>
	  <h2 style="text-align : right;"><a href="http://localhost/payroll/Login/index.php">Logout</a></h1>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Admin/ad1.html">Basic Information</a>
	<a href="http://localhost/payroll/Admin/ad6.php">Designations</a>
    <a href="http://localhost/payroll/Admin/ad2.php#">Credit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad3.php">Debit Parameters</a>
    <a href="http://localhost/payroll/Admin/ad4.php">Information of a Particular Employee</a>
    <a href="http://localhost/payroll/Admin/ad5.php">User</a>
  </div>
</div></li>
        <li class="last"><a href="ttp://localhost/payroll/Admin/ps.php">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad11.php">
  <fieldset>
       <legend style = "color:white;font-size:160%;">CSV FILE</legend>
    Upload the desire file:<br>
    <input type="text" name="CSV" required>
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
</div>
<br><br><br>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad12.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Information of each Employee </legend>
    Employee_id : <br>
    <input type="text" name="Employee_id" required pattern = "[0-9]{1,}" title = "Should Contain only digits">
    <br>
	Employee_name  : <br>
    <input type="text" name="Employee_name" required >
	<br>
	Designation_id  : <br>
    <select  name="Designation_id" >
	<?php
            $sql1= "Select * from designation_table" ;
			$result = mysqli_query($conn,$sql1) ; 
			while($row = $result->fetch_assoc())
			{
			  echo "<option value='";
			  echo $row["Designation_id"] ;
			  echo "'>";
        echo $row["Designation"]. "<br>";
        echo "</option>"; 
			}
	
	?>
	</select>
	<br>
	Department   : <br>
    <input type="text" name="Department" required pattern = "[A-Z]{1,}" title = "Should Contain all letters in Caps">
	<br>
	Address  : <br>
    <input type="text" name="Address" required>
	<br>
	City   : <br>
    <input type="text" name="City" required>
	<br>
	Email-id  : <br>
    <input type="text" name="Email_id" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" title="abc@abc.com">
	<br>
	Phone_no   : <br>
    <input type="text" name="Phone_no" required pattern = "[0-9]{10}" title ="Digits of length 10">
	<br>
	Posting_date  : <br> 
    <input type="text" name="Posting_date" required > (Format :YYYY-MM-DD)
    <br>
	Basic_Pay  : <br>
    <input type="text" name="Basic_Pay"  required pattern = "[0-9]{1,}" title="Don't use commas in between"">
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
</div>
