<?php

  session_start();


  if(!isset($_SESSION['phonenumber'])){

    header('Location: ../orderfreegita/');
    exit();

  }


  $phoneNumber_session = $_SESSION['phonenumber'];
  $phoneNumberStatus="";


  // DB CONNECTION

	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "u549416580_orderfreegita";

  $con = mysqli_connect($servername, $username, $password, $dbname);

  if (mysqli_connect_errno()) {
      exit('Failed to connect to MySQL: ' . mysqli_connect_error(). '. Please try again later.');
  }else{

      try {

          $fetchStatus = "SELECT phone_number_status FROM pending_orders WHERE phonenumber=?";

          $stmt = $con->prepare($fetchStatus);
          
          $stmt->bind_param("s", $phoneNumber_session);

          $stmt->execute();

          $result = $stmt->get_result();

          if($result->num_rows === 0){
              exit('Could not able to fetch any data. Please Try ordering again');
          }


          while($row = $result->fetch_assoc()) {

              $phoneNumberStatus = $row['phone_number_status'];

            }
        
            $stmt->close();


            if($phoneNumberStatus == "expired"){
              echo "<script> alert('ACCESS CODE EXPIRED. CLICK ON RESEND.') </script>";
                
              }
              else if($phoneNumberStatus == "invalid"){
            
                echo "<script> alert('INVALID ACCESS CODE. TRY AGAIN.') </script>";
            
              }
            
              include('../checkpreviousorder.php');
            
             
      } catch (Exception $ex) {
          echo errorMessage($ex->getMessage());
          exit();
      }

  }


  $con->close();


?>


<!DOCTYPE html>

<html>


<head lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title> Order Free Bhagavad Gita - Access Code Verification</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css" integrity="sha512-8M8By+q+SldLyFJbybaHoAPD6g07xyOcscIOQEypDzBS+sTde5d6mlK2ANIZPnSyxZUqJfCNuaIvjBUi8/RS0w==" crossorigin="anonymous" />
<link rel="stylesheet" href="css/bootstrap.min.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.min.js"></script>


<!-- LINKS TO CUSTOM JS & CSS FILES -->

<link rel="stylesheet" href="css/otpverification.css">

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script src="js/otpverification.js"></script>



</head>

<body>

<div class="container topContainer">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-otp my-5">
          <div class="card-body">
            <h5 class="card-title text-center">ACCESS CODE</h5>
            <form class="form-otp" method="post" action="verifyOTP.php">

            <!-- <form class="form-otp" method="post" action=""> -->

            <span id="message">Enter the acces code sent (via SMS) to your mobile number <b class="text-primary">+1 <?php echo $phoneNumber_session?></b></span>

            <br> <br>

            <div class="form-label-group">
                <input type="text" maxlength="6" id="inputOTP" name="otp" class="form-control" placeholder="ACCESS CODE" required autofocus>
                <label for="inputOTP">Access Code</label>
            </div>

              <br>

              <div class="container captchaG">
                <div id="recaptcha-container"></div>
              </div>


              <br>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" >SUBMIT</button>


              <hr class="my-4">

              <div class="text-center lool">
              <span id="message">Didn't receive the code?</span>
              <br> <br>
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="button"><i class="fab fa-google mr-2"></i> RESEND</button>

              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>



</html>
