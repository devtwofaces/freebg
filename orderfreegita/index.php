


<!DOCTYPE html>

<html>


<head lang="en">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title> Order Free Bhagavad Gita </title>


  <!-- Production version popperjs-->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css" integrity="sha512-8M8By+q+SldLyFJbybaHoAPD6g07xyOcscIOQEypDzBS+sTde5d6mlK2ANIZPnSyxZUqJfCNuaIvjBUi8/RS0w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/bootstrap.min.css">



  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.min.js"></script>


<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.0/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.2.0/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.2.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.0/firebase-firestore.js"></script>


<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyB-iDW3iTN50uigoAdtlXpAaftpNmhVQmo",
    authDomain: "freebhagavadgitacanada.firebaseapp.com",
    projectId: "freebhagavadgitacanada",
    storageBucket: "freebhagavadgitacanada.appspot.com",
    messagingSenderId: "788900044192",
    appId: "1:788900044192:web:788a1ec44eaf1e961998c5",
    measurementId: "G-RXG1FWNR9Q"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>





  <!-- LINKS TO CUSTOM JS & CSS FILES -->

  <link rel="stylesheet" href="css/orderfreegita.css">
  <script src="js/orderfreegita.js"></script>



  </script>

</head>


<body>



<div class="container"> 
    
    <div class="text-center mt-4">
        <h1 class="contactUs"><strong>ADDRESS</strong></h1> <br>
        <p id="note">Please note that we'll be calling you to confirm the order. Only after the confirmation, we'll be shipping the book.</p>
    </div>

        <?php

        session_start();

        if(isset($_SESSION['errorMsg'])){

                $errorMessage = $_SESSION['errorMsg'];

                echo "<div class=\"text-center mt-4\">
                        <p id=\"note\"><ul style=\"list-style-type:none;color:red;\">".$errorMessage."<ul></p>
                      </div>";

        }

        session_destroy();


        ?>



    <div class="row ">
        <div class="col-lg-9 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="orderForm" method="post" action="submit.php" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_firstname">First Name <span style="color:red">*</span></label> <input maxlength="30" id="form_firstname" type="text" name="firstname" class="form-control" placeholder="First Name" required data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Last Name <span style="color:red">*</span></label> <input maxlength="30" id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Last Name" required data-error="Lastname is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_phone">Phone (Do not include +1) <span style="color:red">*</span></label> <input maxlength="10" id="form_phone" type="text" name="phonenumber" class="form-control" placeholder="Phone Number" required data-error="Valid phone number is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Email <span style="color:red">*</span></label> <input maxlength="30" id="form_email" type="email" name="email" class="form-control" placeholder="Email" required data-error="Valid email is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_address_1">Address Line 1 <span style="color:red">*</span></label> <input maxlength="50" id="form_address_1" type="text" name="address1" class="form-control" placeholder="Address Line 1" required data-error="Address is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_address_2">Address Line 2 (Optional)</label> <input maxlength="50" id="form_address_2" type="text" name="address2" class="form-control" placeholder="Address Line 2"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_landmark">Landmark (Optional)</label> <input maxlength="30" id="form_landmark" type="text" name="landmark" class="form-control" placeholder="Landmark"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_state">State <span style="color:red">*</span></label> <select id="form_state" name="statename" class="form-control" required data-error="Please select a State.">
                                              <option  class="styled-input wide" disabled selected>Choose State</option>
                                              <option  class="styled-input wide" value = "alberta"> Alberta </option>
                                              <option class="styled-input wide"  value = "British Columbia"> British Columbia </option>
                                              <option  class="styled-input wide" value = "Manitoba"> Manitoba </option>
                                              <option  class="styled-input wide" value = "New Brunswick"> New Brunswick </option>
                                              <option  class="styled-input wide" value = "NewFoundland and labrador"> NewFoundland and Labrador </option>
                                              <option  class="styled-input wide" value = "Nova Scotia"> Nova Scotia </option>
                                              <option  class="styled-input wide" value = "Northwest Territory"> Northwest Territory </option>
                                              <option  class="styled-input wide" value = "Nunavut Territory"> Nunavut Territory </option>
                                              <option  class="styled-input wide" value = "Ontario"> Ontario </option>
                                              <option  class="styled-input wide" value = "Prince Edward Island"> Prince Edward Island </option>
                                              <option  class="styled-input wide" value = "Quebec"> Quebec </option>
                                              <option  class="styled-input wide" value = "Saskatchewan"> Saskatchewan </option>
                                              <option  class="styled-input wide" value = "Yukon"> Yukon </option>
                                            </select> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_city">City <span style="color:red">*</span></label> <input maxlength="30" id="form_city" type="text" name="cityname" class="form-control" placeholder="City Name" required data-error="City Name is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_postalcode">Postal Code <span style="color:red">*</span></label> <input maxlength="6" id="form_postalcode" type="text" name="postalcode" class="form-control" placeholder="Postal Code" required data-error="Postal code is required."> </div>
                                    </div>
                                </div>

                                <input type="hidden" name="verifyRecaptchaToken" id="verifyRecaptchaToken" />
                                <hr class="my-4">                  

                            </div>
                        </form>

                        

                        <div class="row">
                                    <div class="col-md-12" id="orderButton">
                                        <div class="captchaG">
                                            <div id="recaptcha-container"></div>
                                        </div>
                                        <a  onclick="submitOrder()" class="buttonON"> ORDER NOW </a>
                                        <!-- <a class="buttonON"> ORDER NOW </a> -->
                                    </div>
                                </div>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>

</body>

</html>


