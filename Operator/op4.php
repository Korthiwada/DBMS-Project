<?php

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
?> 
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
      <h1><a href="http://localhost/payroll/Login/index.php">Pay Roll</a></h1>
      <h2>Operator</h2>
	  <h2 style="text-align:right"><a href="http://localhost/payroll/Login/index.php">Logout</a> </h2>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Operator/op1.php">Basic Information</a>
    <a href="http://localhost/payroll/Operator/op2.php">Credit Parameters</a>
    <a href="http://localhost/payroll/Operator/op3.php">Debit Parameters</a>
	<a href='http://localhost/payroll/Operator/op4.php'>Information of a Particular Employee</a>
  </div>
</div></li>
        <li class="last"><a href="#">Pay slip generation</a></li>
      </ul>
    </nav>
  </header>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {
   				  
		 echo "
<div class ='wrapper row2'> ";
 
$Employee_id = $_POST["Employee_Id"];
$sql = "Select Employee_id from basic_inforamtion where Employee_id = '$Employee_id'";
$result = mysqli_query($conn,$sql);
 $num_rows = mysqli_num_rows($result);
  
  if($num_rows > 0)
  {
   echo " 
    <form action='http://localhost/payroll/Operator/op41.php' method='post'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Employee id</legend>
   <input type='hidden' value =' " ; echo $Employee_id ; echo " ' name='Employee_Id'></input>"; 
   echo "Employee_Id :";
   echo $Employee_id  ; 
   echo "<br> <br>
     Select type of Type : <br>
  <input type='radio' name='ty' value='0' checked>Funds 
  <input type='radio' name='ty' value='1'> Loan<br>
    Parameter to be updated: <br>  
   <select name='Debit_item' >";
$sql = "Select Debit_item from debit_items where Debit_Select = '1' ";
$result = mysqli_query($conn,$sql);
	while($row = $result->fetch_assoc()) 
		{
	    echo "<option>" ;
        echo $row["Debit_item"]. "<br>" ;
        echo "</option>";    
	}
	echo "
   </select>  
   <br>  
     Debit_Value: <br>
<input type='text' name='Debit_Value'>
<br>
        No . of installations : (if it is fund type 1 in this column)<br>
<input type='text' name='noi'>
<br>
        Interest : <br>
<input type='text' name='interest'>
<br>
   <input type='submit' value='Submit'>
  </fieldset>
  </form>
</div>
  <br><br><br>";
			  }
			  else {
echo "	
     <form action='http://localhost/payroll/Operator/op4.php' method = 'post'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Employee id</legend>
    Employee_Id: <br> 			  
	<input type='text' name='Employee_Id'> 
	<br>
   <input type='submit' value='Submit'>
    <h4>Employee_Id doesn't exists </h4>
  </fieldset>
  </form>
</div>
  <br><br><br>" ;
      	}
			  }
			  else {
				  echo "
<div class ='wrapper row2'>
  <form action='http://localhost/payroll/Operator/op4.php' method = 'post'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Add</legend>
    Employee_Id: <br>
<input type='text' name='Employee_Id'>
<br>
   <input type='submit' value='Submit'>
  </fieldset>
  </form>
</div>
  <br><br><br>
  <div class ='wrapper row2'>
  <form action='http://localhost/payroll/Operator/op42.php' method = 'post'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Delete</legend>
    Employee_Id: <br>
<input type='text' name='Employee_Id'>
<br>
Debit_Id: <br>
<input type='text' name='Debit_Id'>
<br>
   <input type='submit' value='Submit'>
  </fieldset>
  </form>
</div>
  <br><br><br>";
			  }
  ?>
			  }