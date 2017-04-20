

<?php
$nameErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Username"])) {
    $nameErr = "Name is required";
	echo $nameErr ; 
  } else {
    $Username = test_input($_POST["name"]);
	ECHO "pRINTE";
  }
}


$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Create database
$sql = "CREATE DATABASE payroll";
if (mysqli_query($conn, $sql)) {
    echo "<br><br>Database created successfully <br>";
	
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
$sql ="use payroll";
if(mysqli_query($conn, $sql))
{
	echo "Database changed Successfully <br>";
}
else
{
	echo "Error using database " . mysqli_error($conn);
	
}
	


// Type of designations in institute
$tab = "Designation_table";
$sql = "create table $tab ( 
        Designation_id integer NOT NULL,
		Designation char(45), 
		Basic_Salary integer NOT NULL, 
		primary key(Designation_id))";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
	}
	
// Information about each Employee	
$tab = "Basic_Inforamtion";
$sql = "create table $tab (
          Employee_id INT NOT NULL,
		  Employee_name VARCHAR(45),
		  Designation_id INT , 
		  Department VARCHAR(45) , 
		  Address VARCHAR(45) , 
		  City VARCHAR(45), 
		  City_type varchar(45) , 
		  Phone_no VARCHAR(45) , 
		  Posting_date DATE  ,
		  primary key(Employee_id , Designation_id) ,
		  foreign key(Designation_id) REFERENCES Designation_table(Designation_id))";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
	}
 
//The credit items  
$tab = "Credit_items";
$sql = "create table $tab ( 
         Credit_id integer,
		 Credit_name varchar(45),
		 primary key(Credit_id)
		                  )";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
	}
	
// Credit Parameters 
$tab = "Credit_Parameters";
$sql = "create table $tab ( 
         Credit_id integer, 
		 Credit_type integer,
		 Credit_Parameter float,
	     From_ integer,
		 To_ integer,
		 Date DATE ,
		 foreign key(Credit_id) REFERENCES Credit_items(Credit_id)
		                  )";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
	}
	
//	Debit Items
$tab = "Debit_Items";
$sql = "create table $tab ( 
         Debit_id integer,
         Debit_item varchar(45),
        primary key(Debit_id)		 
						  )";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
	}

	//	Debit Items
$tab = "Debit_Parameters";
$sql = "create table $tab ( 
         Debit_id integer,
         Debit_Type integer,
         Tax_Slabs VARCHAR(45),
         Debit_Parameter float ,	
         foreign key(Debit_id) REFERENCES  Debit_Items(Debit_id)		 
						  )";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
	}

$tab = "Debit_informaton_of_a_Particular_Employee";
$sql = "create table $tab ( 
          Employee_id integer NOT NULL,
          Debit_id integer,
          Debit_Parameter integer,
          No_of_installations integer,
          date_of_taken DATE ,
          TOTAL_Amount integer,
		  foreign key(Employee_id) REFERENCES  Basic_Inforamtion(Employee_id),
		  foreign key(Debit_id) REFERENCES  Debit_Items(Debit_id)
                  		  )";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
     } 


$tab = "Pay_roll_of_a_particular_month";
$sql = "create table $tab ( 
    Employee_id integer NOT NULL,
    Designation_id integer NOT NULL,
    Date_of_pay DATE ,  
	Basic_Pay integer, 
	HRA integer ,
	SDA integer ,
	SPL_REMOTE_LOCAL_ALLOW integer, 
	NPA integer,
	PERSONAL_PAY integer, 
	DA integer ,
	ADJT_OF_PAY integer,  
	ADDL_ALLOW integer,  
	TRAN_ALLOW integer, 
	ARREAR_DA integer, 
 	Income_Tax integer,
 	GPF_sub integer  ,
 	Festival_Adv integer, 
 	HBA integer ,
 	Motor_Adv integer, 	
 	Household_Adv integer, 
 	Professional_Tax integer, 
 	Donation integer ,
 	Telephone_Charge integer,
 	Excess_Pay_Reovery integer, 
 	GLIS integer ,
 	Revenue_Stamp integer,  
 	IIITG_Club integer ,
 	CPF_Club integer  ,
	Pay_Recovery integer  ,
	Licence_Fee integer ,
	GPF_Adv integer ,
	Electricity_Charge integer ,
	Computer_Loan integer ,
	Scooter_Advance integer  ,
	SSP integer ,
	Cgi integer,
	LIC integer ,
	CPF_Advance integer  ,
	Deduction_hra integer ,
    primary key(Employee_id,Designation_id)  ,
	foreign key(Employee_id) REFERENCES  Basic_Inforamtion(Employee_id),
    foreign key(Designation_id) REFERENCES  Designation_table(Designation_id)
                  		  )";
if(mysqli_query($conn, $sql))
{
	echo ("$tab created successfully <br>");
}
else {
    echo "Error creating table:  " . mysqli_error($conn);
    echo " <br>" ;
     } 	 
	 
//drop the database
/*$sql = "drop database payroll";
mysqli_query($conn, $sql);
echo "DATABASE dropped successfully  ";
mysqli_close($conn);
*/
?>