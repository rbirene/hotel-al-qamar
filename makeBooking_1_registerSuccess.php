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
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
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
        </div>
      </div>
    </nav>

    <section class="steps">
      <div class="container">
        <div class="row d-flex justify-content-between text-center">
          <div class="col-2">
            <p><span class="fa fa-circle" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;your details</p>
          </div>
          <div class="col-1">
            <span class="fa fa-caret-right" aria-hidden="true">
          </div>
          <div class="col-2">
            <p><span class="fa fa-circle-o" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;booking info</p>
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
    //PHP variables for login form
    $lGuestIDError = $lGuestPasswordError = "";
    $lGuestID = $lGuestPassword = "";

    //if info in the login form is submitted then...
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      //...if lGuestID field is left empty then display error message...
      if (empty($_POST["lGuestID"])){
        $lGuestIDError = "*please enter your Guest ID";
      }
      //...otherwise the lGuestID is as entered.
      else{
        $lGuestID = $_POST["lGuestID"];
      }

      //...if lGuestPassword field is left empty then display error message...
      if (empty($_POST["lGuestPassword"])){
        $lGuestPasswordError = "*please enter your password";
      }
      //...otherwise the lGuestPassword is as entered.
      else{
        $lGuestPassword = $_POST["lGuestPassword"];
      }

    }
    ?>

    <section class="step1Content">
      <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-5">
            <img class="step1Img" src="img/imgStep1.jpg" alt="opening hotel door">
          </div>
          <div class="col-6 text-center">
            <h2>Registration Complete</h2>
            <p>You have successfully registered an account. Please log in your new details below.</p>
            <form method="post" action="checkLogin.php">
              <div class="form-row d-flex justify-content-center">
                <label for="lGuestID">Guest ID</label>
                <input class="form-control" type="text" name="lGuestID" placeholder="Guest ID">
                <small class='text-left form-text error'><?php echo $lGuestIDError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <label for="lGuestPassword">Password</label>
                <input class="form-control" type="password" name="lGuestPassword" placeholder="Password">
                <small class='text-left form-text error'><?php echo $lGuestPasswordError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <input class="btnStyleGreyFill submitBtn" type="submit" value="login" title="login">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </body>

</html>
