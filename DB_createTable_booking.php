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

  // sql to create table
  $sql = "CREATE TABLE test2_tblBookingRequestDetails (
	DBbID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	DBgID INT(8) NOT NULL,
	DBrID INT(8) NOT NULL,
	DBbCheckIn DATE NOT NULL,
	DBbNightsNo INT(2) NOT NULL,
	DBbAdultNo INT(1) NOT NULL,
	DBbChildrenNo INT(1),
	DBbRequest VARCHAR(500),
	DBbTotalPrice DECIMAL(18,2) NOT NULL,
	reg_date TIMESTAMP
  )";

	//"INT(3)" - integers (e.g. 3 digits max)
	//"UNSIGNED" - can't be negative
	//"AUTO_INCREMENT" - automatically increments/adds one (e.g. automatically adding one to id)
	//"PRIMARY KEY" - makes field a primary key
	//"DATE" - the date in YYYY-MM-DD format
	//"DECIMAL(18,2)" - decimal number (e.g. 18 digits to left of decimal, 2 digits to right of decimal)
	//"VARCHAR(500)" - variety of characters (e.g. 500 characters max)
	//"FOREIGN KEY" - makes field a foreign key
	//"REFERENCES" - which table and field the foreign key is referencing

	if (mysqli_query($conn, $sql)) { //if connection and table creation is successful...
	echo "<p>Table 'test_tblBookingRequestDetails' has been created successfully.</p>"; //...then display this
	}

	else { //otherwise...
	echo "<p>Error creating table: " . mysqli_error($conn) . "</p>"; //...display error message
	}

	mysqli_close($conn); //closes connection

?>
