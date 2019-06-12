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
  $sql = "CREATE TABLE test_guests (
		DBgID INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		DBgFName VARCHAR(50) NOT NULL,
		DBgLName VARCHAR(50) NOT NULL,
		DBgEmail VARCHAR(50) NOT NULL,
		DBgPassword VARCHAR(50) NOT NULL,
		reg_date TIMESTAMP
  )";

	//"INT(6)" - integers (e.g. 2 digits)
	//"UNSIGNED" - can't be negative
	//"AUTO_INCREMENT" - automatically increments/adds one (e.g. automatically adding one to id)
	//"PRIMARY KEY" - makes field the primary key
	//"VARCHAR(50)" - characters in the field (e.g. 50)
	//"NOT NULL" - field is required, cannot be left empty

  if (mysqli_query($conn, $sql)) { //if connection and table creation is successful...
    echo "<p>Table 'test_guests' has been created successfully.</p>"; //...then display this
  } else { //otherwise...
    echo "<p>Error creating table: " . mysqli_error($conn) . "</p>"; //...display error message
  }

  mysqli_close($conn); //closes connection
  ?>
