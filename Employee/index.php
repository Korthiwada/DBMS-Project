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
 
 $T = 3;		
$sql1= " SELECT Employee_id FROM user Where Employee_id =' $User_Id'and Password ='$Password' and User_Type = '$T' ";
$result = mysqli_query($conn, $sql1);
$num_rows = mysqli_num_rows($result);
  
  if($num_rows > 0)
  {

   header("Location: http://localhost/payroll/Employee/ps.php"); 
  } 
else {
$sql1= " SELECT Employee_id FROM user Where Employee_id =' $User_Id' and User_Type = '$T' ";
$result1 = mysqli_query($conn, $sql1);
$num_rows = mysqli_num_rows($result1);
  if($num_rows > 0)
  {
$Error = "<h5> Password doesn't match<h5>" ;
$Error1 = "<h5> Try Again.....<h5>" ;
}
else
{
$Error = "<h5> Employee id doesn't exists<h5>"	;
$Error1 = "<h5> Try Again.....<h5>" ;
}
}
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://localhost/payroll/Employee/css/1.css">
     <link rel="stylesheet" href="http://localhost/payroll/Employee/css/index.css">
  <script src="http://localhost/payroll/Employee/css/1.js"></script>
  <script src="http://localhost/payroll/Employee/css/2.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Payroll</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-10" style = "text-align:center">
								 <form class="form" style = "text-align:center" role="form" method="post" action="http://localhost/payroll/Employee/index.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group" style = "text-align:right">
											 <label class="sr-only" for="exampleInputEmail2">Employee_id</label>
											 <input class="form-control" id="exampleInputEmail2" placeholder="Employee Id" name='User_Id' required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name='Password' required>
										</div>
										<div class="form-group">
										<a href="http://localhost/payroll/Login/index.php">
  <img src="d.jpg" style="width:180px;height:30px;border:0;">
</a>
										</div>
																				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {   
		             echo "$Error" ;
              }
			  ?>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST') 
              {   
		             echo "$Error1" ;
              }
			  ?>
								 </form>
							</div>
							</div>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron" >
  <div >
  <img src="payroll.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div> 
  </div>
</div>
 
<footer class="container-fluid text-center">
  <p>Your Pay Is Our Pay</p>
</footer>

</body>
</html>
