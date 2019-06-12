<?php
//*****************CONNECTION*****************
session_start();
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

	//accesses rGuestFName from registration and assigns to variable
	$rGuestFName=$_POST["rGuestFName"];
  //accesses rGuestLName from registration and assigns to variable
	$rGuestLName=$_POST["rGuestLName"];
  //accesses rGuestEmail from registration and assigns to variable
	$rGuestEmail=$_POST["rGuestEmail"];
  //accesses rGuestFName from registration and assigns to variable
	$rGuestPassword=$_POST["rGuestPassword"];

	//enter new record into database
	$sql = "INSERT INTO test_tblGuestDetails (DBgFName, DBgLName, DBgEmail, DBgPassword)
	VALUES ('$rGuestFName', '$rGuestLName', '$rGuestEmail', '$rGuestPassword')";

	if (mysqli_query($conn, $sql)) { //if connection and record creation is successful...
		header ("Location: makeBooking_1_registerSuccess.php");
	}

	else { //otherwise...
		header ("Location: makeBooking_1_registerError.php");
	}

	mysqli_close($conn); //closes connection
?>
