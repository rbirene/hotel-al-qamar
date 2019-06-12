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
    //PHP variables for form validation
    $rGuestFNameError = $rGuestLNameError = $rGuestEmailError = $rGuestConfirmEmailError = $rGuestPasswordError = $rGuestConfirmPasswordError = "";
    $rGuestFName = $rGuestLName = $rGuestEmail = $rGuestConfirmEmail = $rGuestPassword = $rGuestConfirmPassword = "";

    //PHP variables for e-mail address validation
    $rGuestEmailValidationError = "";
    $rGuestConfirmEmailValidationError = "";

    //PHP variables for password validation
    $rGuestPasswordValidationError = "";
    $rGuestConfirmPasswordValidationError = "";

    //if info in the login form is submitted then...
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      //...if rGuestFName field is left empty then display error message...
      if (empty($_POST["rGuestFName"])){
        $rGuestFNameError = "*please enter your first name";
      }
      //...otherwise the rGuestFName is as entered.
      else{
        $rGuestFName = $_POST["rGuestFName"];
      }

      //...if rGuestLName field is left empty then display error message...
      if (empty($_POST["rGuestLName"])){
        $rGuestLNameError = "*please enter your last name";
      }
      //...otherwise the rGuestLName is as entered.
      else{
        $rGuestLName = $_POST["rGuestLName"];
      }

      //...if rGuestEmail field is left empty then display error message...
      if (empty($_POST["rGuestEmail"])){
        $rGuestEmailError = "*please enter your e-mail address";
      }
      //...otherwise the rGuestEmail is as entered.
      else{
        $rGuestEmail = $_POST["rGuestEmail"];
      }

      //...if rGuestConfirmEmail field is left empty then display error message...
      if (empty($_POST["rGuestConfirmEmail"])){
        $rGuestConfirmEmailError = "*please confirm your e-mail address";
      }
      //...otherwise the rGuestConfirmEmail is as entered.
      else{
        $rGuestConfirmEmail = $_POST["rGuestConfirmEmail"];
      }

      //...if rGuestPassword field is left empty then display error message...
      if (empty($_POST["rGuestPassword"])){
        $rGuestPasswordError = "*please enter a password";
      }
      //...otherwise the rGuestPassword is as entered.
      else{
        $rGuestPassword = $_POST["rGuestPassword"];
      }

      //...if rGuestConfirmPassword field is left empty then display error message...
      if (empty($_POST["rGuestConfirmPassword"])){
        $rGuestConfirmPasswordError = "*please confirm password";
      }
      //...otherwise the rGuestConfirmPassword is as entered.
      else{
        $rGuestConfirmPassword = $_POST["rGuestConfirmPassword"];
      }

      //validates e-mail address
      $rGuestEmailValidation = $_POST["rGuestEmail"];
      $rGuestConfirmEmailValidation = $_POST["rGuestConfirmEmail"];

      if ($rGuestConfirmEmailValidation!=$rGuestEmailValidation){
        $rGuestEmailValidationError = "*e-mail address does not match";
        $rGuestConfirmEmailValidationError = "*e-mail address does not match";
    	}

      //validates password
      $rGuestPasswordValidation = $_POST["rGuestPassword"];
      $rGuestConfirmPasswordValidation = $_POST["rGuestConfirmPassword"];

      if ($rGuestConfirmPasswordValidation!=$rGuestPasswordValidation){
        $rGuestPasswordValidationError = "*password does not match";
        $rGuestConfirmPasswordValidationError = "*password does not match";
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
            <h2>Your Details</h2>
            <p>Do you already have an account with us? Please login below.</p>
            <form method="post" action="checkRegister.php">
              <div class="form-row d-flex justify-content-center">
                <label for="rGuestFName">First name</label>
                <input class="form-control" type="text" name="rGuestFName" placeholder="First name">
                <small class='text-left form-text error'><?php echo $rGuestFNameError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <label for="rGuestLName">Last name</label>
                <input class="form-control" type="text" name="rGuestLName" placeholder="Last name">
                <small class='text-left form-text error'><?php echo $rGuestLNameError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <label for="rGuestEmail">E-mail address</label>
                <input class="form-control" type="email" name="rGuestEmail" placeholder="E-mail address">
                <small class='text-left form-text error'><?php echo $rGuestEmailError;?></small>
                <small class='text-left form-text error'><?php echo $rGuestEmailValidationError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <label for="rGuestConfirmEmail">Confirm your e-mail address</label>
                <input class="form-control" type="email" name="rGuestConfirmEmail" placeholder="Confirm your e-mail address">
                <small class='text-left form-text error'><?php echo $rGuestConfirmEmailError;?></small>
                <small class='text-left form-text error'><?php echo $rGuestConfirmEmailValidationError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <label for="rGuestPassword">Enter a password</label>
                <input class="form-control" type="password" name="rGuestPassword" placeholder="Password">
                <small class='text-left form-text error'><?php echo $rGuestPasswordError;?></small>
                <small class='text-left form-text error'><?php echo $rGuestPasswordValidationError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <label for="rGuestConfirmPassword">Confirm password</label>
                <input class="form-control" type="password" name="rGuestConfirmPassword" placeholder="Password">
                <small class='text-left form-text error'><?php echo $rGuestConfirmPasswordError;?></small>
                <small class='text-left form-text error'><?php echo $rGuestConfirmPasswordValidationError;?></small>
              </div>
              <div class="form-row d-flex justify-content-center">
                <input class="btnStyleGreyFill submitBtn" type="submit" value="register" title="register">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </body>

</html>
