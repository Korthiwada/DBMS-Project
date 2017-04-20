<?php
/*$nameErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Username"])) {
    $nameErr = "Name is required";
	echo $nameErr ; 
  } else {
    $Username = test_input($_POST["name"]);
	ECHO "pRINTE";
  }
}*/


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
  else 
  {
     $T = 3;		 
  }
	 
$sql1= ' SELECT Employee_id FROM user Where Employee_id = $User_Id and Password = $Password and User_Type = $T ';
$result = mysqli_query($conn, $sql1);
$num_rows = mysqli_num_rows($result);

 if ($T == 2 )
 {
	 echo "successful";
// header("Location: "http://localhost/payroll/Operator.php");
 //die();
 }       
else {
    echo "<h2> Error in Credentials........ Try Again ....... </h2>";
}
?>
