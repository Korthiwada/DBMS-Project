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
<title>Admin</title>

<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="http://localhost/payroll/Login/index.php">Pay Roll</a></h1>
      <h2>Admin</h2>
    </div>
    <nav>
      <ul>
        <li><div class="dropdown">
  <button class="dropbtn">Upload</button>
  <div class="dropdown-content">
    <a href="http://localhost/payroll/Admin/ad1.html">Basic Information</a>
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
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') 
              { 
		  	$q ='100';
$Month = $_POST["Month"];
if($Month == '1')
{
$Month1 = 'January' ;
}
if($Month == '2')
{
$Month1 = 'February' ;
}
if($Month == '3')
{
$Month1 = 'March' ;
}
if($Month == '4')
{
$Month1 = 'April' ;
}
if($Month == '5')
{
$Month1 = 'May' ;
}
if($Month == '6')
{
$Month1 = 'June' ;
}
if($Month == '7')
{
$Month1 = 'July' ;
}
if($Month == '8')
{
$Month1 = 'August' ;
}
if($Month == '9')
{
$Month1 = 'September' ;
}
if($Month == '10')
{
$Month1 = 'October' ;
}
if($Month == '11')
{
$Month1 = 'Novemmber' ;
}
if($Month == '12')
{
$Month1 = 'December' ;
}	
$Year = $_POST["Year"];
$sql = "Select Month,Year from Credit where Month = '$Month' and Year = '$Year' ";
$result = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($result);
  
  if($num_rows > 0)
  {
     echo " 
  <form action='http://localhost/payroll/Admin/ps1.php' method = 'post'>
  <fieldset>
      <legend style = 'color:white;font-size:160%;'>Pay Slips</legend>
   <h3> Pay Slips exists already </h3>   
    Employee_id  : 
        <select type='text' name='Employee_id'>
        <br>";
		$sql = "Select Employee_id from basic_inforamtion";
         $result = mysqli_query($conn,$sql);
        while($row = $result->fetch_assoc())
		{
			echo "<option>";
			echo $row["Employee_id"];
			echo "</option>";
        }
		echo "
   </select><br>	
   <input type='hidden' name = 'Month' value='$Month'>
   <input type='hidden' name = 'Year' value='$Year'>   
   <input type='submit' value='Submit'>
  </fieldset>
  </form>
  ";
  }
  else {
$sql = "Select Employee_id,Designation_id,Basic_Pay from basic_inforamtion";	  
$result = mysqli_query($conn,$sql);
  while($row = $result->fetch_assoc())
 {
    $Employee_id = $row["Employee_id"];
    $Designation_id = $row["Designation_id"];	
	$Basic_Pay = $row["Basic_Pay"];
	$Total = '0' ;
   $sql1 = "Insert into credit (Employee_Id,Designation_Id,Month,Year,Basic_Pay) values ('$Employee_id','$Designation_id','$Month','$Year','$Basic_Pay')";
   $result1 = mysqli_query($conn,$sql1);
   $b= 'DA' ;
   $sql1 = "Select I.Credit_Parameter from credit_items c, credit_parameters I where c.Credit_id = I.Credit_id and c.Credit_name = '$b' " ;
   $result1 = mysqli_query($conn,$sql1);
   while($row1 = $result1->fetch_assoc())
 {
	$D = $row1["Credit_Parameter"] ;
	$DA = ($D / $q ) * $Basic_Pay;
 }
   $sql2 =" Select * from credit_items ";   
   $result1 = mysqli_query($conn,$sql2);
     while($row1 = $result1->fetch_assoc())
 {
      $Credit_id = $row1["Credit_id"];
    $Credit_name = $row1["Credit_name"];
	$Credit_no = $row1["Credit_no"];
	if($Credit_no == '0')
	{
	      $sql3 = "Select * from credit_parameters where Credit_id = '$Credit_id'  " ;   
   $result2 = mysqli_query($conn,$sql3);
     while($row2 = $result2->fetch_assoc())
 {   
    $Credit_parameter = $row2["Credit_Parameter"];
	$Credit_type = $row2["Credit_type"];
 }
	if($Credit_type == '1')
	{ 
       $sql3 = "Update credit set $Credit_name = '$Credit_parameter' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
$result3 = mysqli_query($conn,$sql3);
$Total = $Total + $Credit_parameter ;
 }
    if($Credit_type == '2')
	{
	$v = $Basic_Pay * ($Credit_parameter / $q );
	  $sql3 = "Update credit set $Credit_name = '$v' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
$result3 = mysqli_query($conn,$sql3);
$Total = $Total + $v ; 
    }
	   if($Credit_type == '3')
	{
	$q ='100';
	$v = ($Basic_Pay + $DA)* ($Credit_parameter / $q );
	  $sql3 = "Update credit set $Credit_name = '$v' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year' " ;
$result3 = mysqli_query($conn,$sql3); 
$Total = $Total + $v ;
    }
	}
 else 
 {
	 $sql3 = "Select Designation_Type from designation_table where Designation_id = '$Designation_id'";
        $result2 = mysqli_query($conn,$sql3);
     while($row2 = $result2->fetch_assoc())
 {
    $Designation_Type = $row2["Designation_Type"];	 
 }	 
   $sql3 = "Select * from credit_parameters where Credit_id = '$Credit_id' and Designation_Type = '$Designation_Type'" ;   
   $result2 = mysqli_query($conn,$sql3);
     while($row2 = $result2->fetch_assoc())
 {   
    $Credit_parameter = $row2["Credit_Parameter"];
	$Credit_type = $row2["Credit_type"];
 }
	if($Credit_type == '1')
	{ 
       $sql3 = "Update credit set $Credit_name = '$Credit_parameter' where Employee_id = '$Employee_id' and Month = '$Month' and Year = '$Year' " ;
$result3 = mysqli_query($conn,$sql3);
$Total = $Total + $Credit_parameter ;
 }
    if($Credit_type == '2')
	{
	$v = $Basic_Pay * ($Credit_parameter / $q );
	  $sql3 = "Update credit set $Credit_name = '$v' where Employee_id = '$Employee_id' and Month = '$Month' and Year = '$Year' " ;
$result3 = mysqli_query($conn,$sql3); 
$Total = $Total + $v ;
    }
	   if($Credit_type == '3')
	{
	$q ='100';
	$v = ($Basic_Pay + $DA)* ($Credit_parameter / $q );
	  $sql3 = "Update credit set $Credit_name = '$v' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
$result3 = mysqli_query($conn,$sql3);
$Total = $Total + $v ; 
    }
 }
 }
    $Total = $Total;	
	$sql3 = "Update credit set Total = '$Total' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
$result3 = mysqli_query($conn,$sql3); 
 
   $dTotal = '0' ; 
   $sql1 = "Insert into debit (Employee_Id,Designation_Id,Month,Year) values ('$Employee_id','$Designation_id','$Month','$Year')";
   $result1 = mysqli_query($conn,$sql1);
   $sql2 =" Select * from debit_items ";   
   $result1 = mysqli_query($conn,$sql2);
     while($row1 = $result1->fetch_assoc())
 {
   $Debit_id = $row1["Debit_id"] ; 
   $Debit_item = $row1["Debit_item"];
   $Debit_Select = $row1["Debit_Select"];
   	if($Debit_Select == '0')
	{
   $sql3 = "Select * from debit_parameters where Debit_id = '$Debit_id'" ;   
   $result2 = mysqli_query($conn,$sql3);
     while($row2 = $result2->fetch_assoc())
 { 	
    $Debit_Parameter = $row2["Debit_Parameter"];     
	$Debit_type = $row2["Debit_Type"]; 
 }    	
   if($Debit_type == '1' )
   {
    $sql3 = "Update debit set $Debit_item = '$Debit_Parameter' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
   $result3 = mysqli_query($conn,$sql3);
   $dTotal = $dTotal + $Debit_Parameter ;
 }   
   if($Debit_type == '2' )
   {
   $v = $Basic_Pay * ($Debit_parameter / $q );  
   $sql3 = "Update debit set $Debit_item = '$v' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year' " ;
   $result3 = mysqli_query($conn,$sql3);
   $dTotal = $dTotal + $v ;
   }
   if($Debit_type == '4' )
   {
	   $aa = $Basic_Pay * '12';
   $sql3 = "Select * from debit_parameters where Debit_id = '$Debit_id' and t_from < '$aa' and t_to > '$aa'" ;   
   $result3 = mysqli_query($conn,$sql3);
     while($row3 = $result3->fetch_assoc())
 { 	
    $Debit_Parameter = $row3["Debit_Parameter"];     
 } 
   $sql3 = "Update debit set $Debit_item = '$Debit_Parameter' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year' " ;
   $result3 = mysqli_query($conn,$sql3);
   $dTotal = $dTotal + $Debit_Parameter ;
   }   
      if($Debit_type == '3' )
   {
	   $aa = $Total * '12';
   $sql3 = "Select * from debit_parameters where Debit_id = '$Debit_id' and t_from < '$aa' and t_to > '$aa'" ;   
   $result3 = mysqli_query($conn,$sql3);
     while($row3 = $result3->fetch_assoc())
 { 	
    $Debit_Parameter = $row3["Debit_Parameter"];     
 } 
      $v = $Total * ($Debit_Parameter / $q );   
   $sql3 = "Update debit set $Debit_item = '$v' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
   $result3 = mysqli_query($conn,$sql3);
   $dTotal = $dTotal + $v ;
   } 
	}   
    else
	{
   $sql4 = "Select * from debit_informaton_of_a_particular_employee where Debit_id = '$Debit_id' and Employee_id = '$Employee_id'" ;   
   $result4 = mysqli_query($conn,$sql4);
        while($row4 = $result4->fetch_assoc())
 { 
      $Type = $row4["Type"];
	  $Debit_Parameter = $row4["Debit_Parameter"];
	  $No_of_Installations = $row4["No_of_installations"];
	  $Interest = $row4["INTEREST"];
      $Total_Amount =$row4["TOTAL_Amount"] ;
   if ($Type == '1')
   {
	   $v = $Debit_Parameter + ($Debit_Parameter * $Interest) / $q ;
   $sql3 = "Update debit set $Debit_item = '$v' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year' " ;
   $result3 = mysqli_query($conn,$sql3);
   $dTotal = $dTotal + $v ;
   $Total_Amount = $Total_Amount - $Debit_Parameter ;
   $No_of_Installations = $No_of_Installations - '1' ;
   if($Total_Amount > '0' )
   {
   $sql3 = "Update debit_informaton_of_a_particular_employee set No_of_Installations = '$No_of_Installations' , TOTAL_Amount = '$Total_Amount' where Employee_id = '$Employee_id' and Debit_id = '$Debit_id'" ;
   $result3 = mysqli_query($conn,$sql3);
   }
   else{
   $sql3 = "Delete from debit_informaton_of_a_particular_employee where Employee_id = '$Employee_id' and Debit_id = '$Debit_id'" ;
   $result3 = mysqli_query($conn,$sql3);      
   }
   }
      if ($Type == '0')
   {
	$v = ($Debit_Parameter * $Interest) / $q ;
	$v = $Debit_Parameter + $v ;
   $sql3 = "Update debit set $Debit_item = '$Debit_Parameter' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
   $result3 = mysqli_query($conn,$sql3);
   $dTotal = $dTotal + $Debit_Parameter ;
   $Total_Amount = $Total_Amount + $v ;
   $sql3 = "Update debit_informaton_of_a_particular_employee set Total_Amount = '$Total_Amount' where Employee_id = '$Employee_id' and Debit_id = '$Debit_id'" ;
   $result3 = mysqli_query($conn,$sql3);     
   }
   }
 }
 }
     $dTotal = $dTotal ;	
	$sql3 = "Update debit set Total = '$dTotal' where Employee_id = '$Employee_id'  and Month = '$Month' and Year = '$Year'" ;
$result3 = mysqli_query($conn,$sql3);
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 }




















 
     echo " 
  <form action='http://localhost/payroll/Admin/ps1.php' method = 'post'>
  <fieldset>
      <legend style = 'color:white;font-size:160%;'>Pay Slips</legend>
   <h3> Pay Slips created Succesfully created for month:"; echo $Month1 ; echo "   & Year : "; echo $Year; echo" </h3>   
    Employee_id  : 
        <select type='text' name='Employee_id'>
        <br>";
		$sql = "Select Employee_id from basic_inforamtion";
         $result = mysqli_query($conn,$sql);
        while($row = $result->fetch_assoc())
		{
			echo "<option>";
			echo $row["Employee_id"];
			echo "</option>";
        }
		echo "
   </select><br>	
       <input type='hidden' name = 'Month' value='$Month'>
   <input type='hidden' name = 'Year' value='$Year'>   
   <input type='submit' value='Submit'>
  </fieldset>
  </form>
  ";
  }
			  }
			  else {
				  echo "
<div class ='wrapper row2'>
  <form action='http://localhost/payroll/Admin/ps.php' method = 'post'>
  <fieldset>
    <legend style = 'color:white;font-size:160%;'>Pay Slips</legend>
    Month: <br>
<select name='Month'>
<option value='1'> January </option>
<option value='2'>February </option>
<option value='3'>March </option>
<option value='4'>April </option>
<option value='5'>May</option>
<option value='6'>June </option>
<option value='7'>July </option>
<option value='8'>August </option>
<option value='9'>September </option>
<option value='10'>October </option>
<option value='11'>November </option>
<option value='12'>December </option>
</select>
<br>
    Year: <br>
<input type='text' name='Year'>
<br>
   <input type='submit' value='Submit'>
  </fieldset>
  </form>
</div>
  <br><br><br>";
			  }
  ?>
			  