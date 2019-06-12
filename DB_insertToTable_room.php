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
	
//enter new record into database
$sql = "INSERT INTO test_tblRoomTypeDetails (DBrRoomType, DBrRate)
VALUES ('Standard Triple', '110')";

if (mysqli_query($conn, $sql)) { //if connection and record creation is successful...
    echo "<p>New record created successfully.</p>"; //...then display this
} else { //otherwise...
    echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; //...display error message
}

mysqli_close($conn); //closes connection
?>
