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


$sql = "SELECT * FROM test_tblGuestDetails";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { //while there are rows to process...
        echo "<p>ID: " . $row["DBgID"]. "<br>Name: " . $row["DBgFName"]. " " . $row["DBgLName"]. "<br>E-mail Address: " . $row["DBgEmail"]. "<br>Password: " . $row["DBgPassword"]. "</p>"; //show the values in that row
    }
} else { //otherwise...
    echo "<p>0 results.</p>"; //...display zero results
}

mysqli_close($conn); //closes connection
?>
