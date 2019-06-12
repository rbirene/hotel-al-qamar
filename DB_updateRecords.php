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

$sql = "UPDATE test_tblRoomTypeDetails SET DBrRate='120' WHERE DBrID=4";

if (mysqli_query($conn, $sql)) {
    echo "<p>Record updated successfully.</p>";
} else {
    echo "<p>Error updating record: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>
