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

	//accesses check-in date from booking and assigns to variable
	$bCheckIn=$_POST["bCheckIn"];
	//accesses number of nights staying from booking and assigns to variable
	$bNightsNo=$_POST["bNightsNo"];
	//accesses room type from booking and assigns to variable
	$bRoomTypeString=$_POST["bRoomType"];
	$bRoomType=intval($bRoomTypeString);
	
	echo "Values: ". " bRoomType=" . $bRoomType . "<br>";
	
	//accesses number of adults from booking and assigns to variable
	$bAdultNo=$_POST["bAdultNo"];
	//accesses number of children from booking and assigns to variable
	$bChildrenNo=$_POST["bChildrenNo"];
	//accesses requests from booking and assigns to variable
	$bRequest=$_POST["bRequest"];
	
	//select everything from room table where the room type in the booking form matches the room tpye in the database
	
	$sql = "SELECT * FROM test_tblRoomTypeDetails WHERE DBrID = $bRoomType";
	//$sql = "SELECT * FROM test_tblRoomTypeDetails WHERE DBrRoomType == $bRoomType";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    //fetch relevant data and assign to variables
	echo "Room type found<br>";
		while($row = mysqli_fetch_assoc($result)) {
			$DBrID=$row["DBrID"];
			$DBrRoomType=$row["DBrRoomType"];
			$DBrRate=$row["DBrRate"];
		}
	}
	
	//multiplies number of nights staying with room rate to give total price of booking
	$bTotalPrice = $bNightsNo*$DBrRate;
	
	//access guest id from session
	$DBgID = $_SESSION["DBgID"];
	
	//######################################################################################################################
	//enter new record into database
	//$sql = "INSERT INTO geotest_tblBookingRequestDetails (DBgID, DBrID, DBbCheckIn, DBbNightsNo, DBbAdultNo, DBbTotalPrice)
	//VALUES ('1', '2', '2018-11-12', '3', '4', '100')";
	
	//echo "Values: ". "DBgID=".$DBgID . " DBrID=" . $DBrID . " bCheckIn=" . $bCheckIn . " bNightsNo=" . $bNightsNo . " bAdultNo=" . $bAdultNo . " bChildrenNo=" . $bChildrenNo . " bRequest=" . $bRequest . " bTotalPrice=" . $bTotalPrice . "<br>";
	
	//$sql = "INSERT INTO geotest_tblBookingRequestDetails (DBbRequest) VALUES ('Hello')";
	
	$sql = "INSERT INTO geotest3_tblBookingRequestDetails (DBbNightsNo, DBbAdultNo, DBbRequest) VALUES ('$bNightsNo', '$bAdultNo', '$bRequest')";
	
	echo "Values: ". " bNightsNo=" . $bNightsNo . " bAdultNo=" . $bAdultNo . " bRequest=" . $bRequest . $bCheckIn . "<br>";
	
	//######################################################################################################################


	mysqli_close($conn); //closes connection
?>
