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
        <li class="last"><a href="http://localhost/payroll/Admin/ps.php">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad51.php">
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
  <form action="http://localhost/payroll/Admin/ad52.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Adding a new User </legend>
   
   Type : <br>
<select name="Type">
<option> Adminstrator</option>
<option> Operator   </option>
<option> Employee   </option>
</select>
	<br>
	User_Id : <br>
    <input type="text" name="User_Id" required>
    <br>
	Password : <br>
<input type="text" name="Password" required>
	<br>
    <input type="submit" value="Submit" required>
  </fieldset>
</form>
</div>
<br><br><br>
<div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad53.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Updating a User Credentials </legend>
    		Type : <br>
<select name="Type">
<option> Adminstrator</option>
<option> Operator   </option>
<option> Employee   </option>
</select>
	<br>
	User_Id: <br>
    <input type="text" name="User_id"required>
    <br>
   <input type="submit" value="Submit" required>
  </fieldset>
  </form>
</div>
  <br><br><br>
  <div class ="wrapper row2">
  <form action="http://localhost/payroll/Admin/ad54.php">
  <fieldset>
    <legend style = "color:white;font-size:160%;">Deleting a User </legend>
    		Type : <br>
<select name="Type">
<option> Adminstrator</option>
<option> Operator   </option>
<option> Employee   </option>
</select>
	<br>
	User_Id: <br>
    <input type="text" name="User_id"required>
    <br>
   <input type="submit" value="Submit" required>
  </fieldset>
  </form>
</div>
  <br><br><br>

