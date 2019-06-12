<?php
session_start();

//*****************CONNECTION*****************

	//makes a connection
	//variables for info needed for db connection
	$servername = "vbcmsq01";
	$username = "BHU15115976"; //use studentID
	$password = "15101996"; //use DOB
	$dbname = "16_BHU15115976"; //use 16_studentID

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname); //four pieces of info needed for db connection

	// Check connection
	if (!$conn) { //if unable to connect...
		die("Connection failed: " . mysqli_connect_error()); //...connection failed
	}
	else{
		echo "Connected successfully.";
	}
	//*****************CONNECTION*****************

  //accesses lGuestID from login and assigns to variable
	$lGuestID=$_POST["lGuestID"];
  //accesses lGuestPassword from login and assigns to variable
	$lGuestPassword=$_POST["lGuestPassword"];

	//selects info about user from database, where ID matches the one used to log in
	$sql = "SELECT * FROM test_tblGuestDetails WHERE DBgID='$lGuestID'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    //fetch relevant data and assign to variables
		while($row = mysqli_fetch_assoc($result)) {
			$DBgPassword=$row["DBgPassword"];
			$DBgID=$row["DBgID"];
			$DBgFName=$row["DBgFName"];
		}
	}

	//VALIDATION - tests if password entered in login form matches password in database

	//if login password matches database password...
	if($lGuestPassword==$DBgPassword){
		//...then assign cookie value to variable
		$cookieValue = "passOK";
		//set cookie, give it a name and value
		setcookie("passCookie", $cookieValue);
		//sets GuestID to session
		$_SESSION["DBgID"]=$DBgID;
		//echo "Session DBgID=".$_SESSION["DBgID"]."<br>";
		//sets Guest First Name to session
		$_SESSION["DBgFName"]=$DBgFName;
		//echo "Session DBgFName=".$_SESSION["DBgFName"]."<br>";
		//and send to booking Step 2
		header ("Location: makeBooking_2.php");
  }

  //otherwise...
  else{
  	//...send to login error page
  	header ("Location: makeBooking_1_loginError.php");
  }
  
?>
