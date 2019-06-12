<?php
session_start();
//if cookie is NOT set...
if(!(isset($_COOKIE["passCookie"]))){
	//...then redirect back to makeBooking_1_login.php
	header("Location: makeBooking_1_login.php");
}
?>

<!DOCTYPE html>
<html lang="en-GB">

  <head>

  <!--
  Page Name: Make Booking
	Author: Irene Bhuiyan
	Description: Page to create a booking.
	Version: 0.0 (October 2017)
	-->

		<meta charset="UTF-8">
		<meta name="description" content="hotel al-qamar">
		<meta name="keywords" content="hotel al-qamar">
		<meta name="author" content="Irene Bhuiyan">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <title>Book Now | Hotel Al-Qamar</title>

    <!--link to bootstrap--->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!--links to stylesheets-->
    <link rel="stylesheet" href="css/booking.css" type="text/css">
		<!--links to Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans|Yeseva+One" rel="stylesheet">
    <!--link to favicon-->
		<link rel="shortcut icon" type="img/gif" href="images/favicon.gif"/>
		<!--link to font awesome-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>

    <nav>
      <div class="container">
        <div class="row d-flex justify-content-between">
          <a href="index.html"><img src="img/logo_white.png" class="logo" alt="Hotel Al-Qamar logo"></a>
		  <p><a href="logout.php">Logout</a></p>
        </div>
      </div>
    </nav>

    <section class="steps">
      <div class="container">
        <div class="row d-flex justify-content-between text-center">
          <div class="col-2">
            <p><span class="fa fa-circle-o" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;your details</p>
          </div>
          <div class="col-1">
            <span class="fa fa-caret-right" aria-hidden="true">
          </div>
          <div class="col-2">
            <p><span class="fa fa-circle" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;booking info</p>
          </div>
          <div class="col-1">
            <span class="fa fa-caret-right" aria-hidden="true">
          </div>
          <div class="col-2">
            <p><span class="fa fa-circle-o" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;payment</p>
          </div>
          <div class="col-1">
            <span class="fa fa-caret-right" aria-hidden="true">
          </div>
          <div class="col-2">
            <p><span class="fa fa-circle-o" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;confirm</p>
          </div>
        </div>
      </div>
    </section>
	
	<?php
    //PHP variables for form
    $bCheckInError = $bNightsNoError = $rRoomTypeError = $bAdultNoError = "";
    $bCheckIn = $bNightsNo = $rRoomType = $bAdultNo = "";

    //if info in the form is submitted then...
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      //...if bCheckIn field is left empty then display error message...
      if (empty($_POST["bCheckIn"])){
        $bCheckInError = "*please enter a check-in date";
      }
      //...otherwise the bCheckIn is as entered.
      else{
        $bCheckIn = $_POST["bCheckIn"];
      }

      //...if bNightsNo field is left empty then display error message...
      if (empty($_POST["bNightsNo"])){
        $bNightsNoError = "*please enter how many nights you are staying";
      }
      //...otherwise the bNightsNo is as entered.
      else{
        $bNightsNo = $_POST["bNightsNo"];
      }
	  
	  //...if bRoomType field is left empty then display error message...
      if (empty($_POST["bRoomType"])){
        $bRoomTypeError = "*please select a room";
      }
      //...otherwise the bRoomType is as entered.
      else{
        $bRoomType = $_POST["bRoomType"];
      }
	  
	  //...if bAdultNo field is left empty then display error message...
      if (empty($_POST["bAdultNo"])){
        $bAdultNoError = "*please enter how many adults are staying";
      }
      //...otherwise the bAdultNo is as entered.
      else{
        $bAdultNo = $_POST["bAdultNo"];
      }

    }
    ?>

    <section class="stepContent">
      <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-7 text-center">
            <h2>Booking Information</h2>
            <form method="post" action="DB_insertToTable_booking_test.php">
              <div class="form-row">
                <div class="col-6">
                  <label for="bCheckIn">Check-In Date</label>
                  <input class="form-control" type="date" name="bCheckIn">
				  <small class='text-left form-text error'><?php echo $bCheckInError;?></small>
                </div>
				<div class="col-6">
                  <label for="bRoomType">Room Type</label>					
					<select class="form-control" name="bRoomType">
					  <option value="1">Standard Single</option>
					  <option value="2">Standard Double</option>
					  <option value="3">Standard Triple</option>
					  <option value="4">Standard Quad</option>
					  <option value="5">Deluxe Single</option>
					  <option value="6">Deluxe Double</option>
					  <option value="7">Deluxe Triple</option>
					  <option value="8">Deluxe Quad</option>
					</select>
					<small class='text-left form-text error'><?php echo $bRoomTypeError;?></small>
                </div>
				<div class="col-4">
                  <label for="bNightsNo">Number of Nights</label>
                  <input class="form-control" type="number" name="bNightsNo" min="1" max="30" placeholder="1">
				  <small class='text-left form-text error'><?php echo $bNightsNoError;?></small>
                </div>
                <div class="col-4">
                  <label for="bAdultNo">Number of Adults</label>
                  <input class="form-control" type="number" name="bAdultNo" min="1" max="4" placeholder="1">
				  <small class='text-left form-text error'><?php echo $bAdultNoError;?></small>
                </div>
                <div class="col-4">
                  <label for="bChildrenNo">Number of Children</label>
                  <input class="form-control" type="number" name="bChildrenNo" min="0" max="4" placeholder="0">
                </div>
                <div class="col-12">
                  <label for="bRequest">Any requests?</label>
                  <textarea class="form-control" name="bRequest" placeholder="Enter requests here."></textarea>
                </div>
				<div class="form-row d-flex justify-content-center">
                <input class="btnStyleGreyFill submitBtn" type="submit" value="continue" title="continue">
              </div>
              </div>

            </form>

          </div>
          <div class="col-3 bookingSummary">
            <h4>Welcome, <?php echo $_SESSION["DBgFName"]; ?>.</h4>
			<p><strong>Guest ID:</strong> <?php echo $_SESSION["DBgID"]; ?></p>
            <hr>
            <h3>Booking Summary</h3>
            <p><strong>Check-In Date:</strong> pending<br>
            <strong>Nights Staying:</strong> pending<br>
            <strong>Room Type:</strong> pending<br>
            <strong>Adults:</strong> pending<br>
            <strong>Children:</strong> pending</p>
            <hr>
            <p><strong>Total Price:</strong> pending</p>
          </div>
        </div>
      </div>
    </section>

  </body>

</html>
