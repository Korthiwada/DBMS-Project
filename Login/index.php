<?php 
session_start(); 





if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
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
$User_Id = $_POST["User_Id"];
$_SESSION["Employee_id"] = $User_Id;
$Password = $_POST["Password"];
$Type = $_POST["User"];
 
  if(strcmp($Type , "Adminstrator" ) == 0 )
  { 
     $T = 1 ;
  }  
  elseif(strcmp($Type , "Operator" ) == 0 )
  {
     $T =2 ;
  }
$sql1= " SELECT Employee_id FROM user Where Employee_id =' $User_Id'and Password ='$Password' and User_Type = '$T' ";
$result = mysqli_query($conn, $sql1);
$num_rows = mysqli_num_rows($result);
  
  if($num_rows > 0)
  {
  if ($T == 1 )
 {
   header("Location: http://localhost/payroll/Admin/index.html");
 }
 if ($T == 2 )
 {

   header("Location: http://localhost/payroll/Operator/index.html");
 }  
  } 
else {
$Error = "<p style='color:red;'> Error in Credentials ........... <p>" ;
}
}



echo "<!DOCTYPE html>
<html >
<head>
  <meta charset='utf-8'>
  <title>Pay Roll</title>
  
  
  
      <link rel='stylesheet' href='css/style.css'>
	  
  
</head>

<body style = 'background:  url(images/p.jpg);'>
  <div class='wrapper'>
	<div class='container'>
		<h1>Welcome</h1>
		
		<form  class='form' action='http://localhost/payroll/Login/index.php' method='post' >
		    <select  name='User'>
             <option value='Adminstrator'>Adminstrator</option>
             <option value='Operator'>Operator</option>
            </select>
			<input type='text' placeholder='User_Id' name='User_Id'>
			<input type='password' placeholder='Password' name='Password' >" ;
				
				if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {   
		             echo "<br>$Error<br>" ;
              }
				echo "
			<button type='submit' id='login-button'>Login</button><br> 
		  
		</form>
		
	</div>
	
	<ul class='bg-bubbles'>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

   <script src='js/index.js'></script>
</body>
</html> ";
?>