<?php

session_start();


if(!isset($_POST['statename'])){
   
    $_SESSION['errorMsg'] = "State name is missing";
    header('Location: index.php');
    exit();   

}


if(isset($_POST['firstname']) and 
   isset($_POST['lastname'])  and 
   isset($_POST['phonenumber']) and 
   isset($_POST['address1']) and 
   isset($_POST['address2']) and 
   isset($_POST['landmark']) and 
   isset($_POST['statename']) and 
   isset($_POST['cityname']) and 
   isset($_POST['email']) and 
   isset($_POST['postalcode']) and 
   isset($_POST['verifyRecaptchaToken']) 
){


        
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_NUMBER_INT);
    $address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
    $address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
    $landmark = filter_var($_POST['landmark'], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['statename'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['cityname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $postalcode = filter_var($_POST['postalcode'], FILTER_SANITIZE_STRING);
    $verifyRecaptchaToken = filter_var($_POST['verifyRecaptchaToken'], FILTER_SANITIZE_STRING);


    $errorMessage = "";

    // EMPTY VALUES VALIDATION

    if(empty($firstname)){

       $errorMessage = $errorMessage."<li>First name is missing</li>";

    }
    if(empty($lastname)){

        $errorMessage = $errorMessage."<li>Last name is missing</li>";
 
    }
    if(empty($phonenumber)){

        $errorMessage = $errorMessage."<li>Phone number is missing</li>";
 
    }
    else{

        if(strlen($phonenumber) != 10){

            $errorMessage = $errorMessage."<li>Enter 10 digit phone number</li>";
     
        }

    }
    
    if(empty($address1)){

        $errorMessage = $errorMessage."<li>Address is missing</li>";
 
    }
    if(empty($email)){

        $errorMessage = $errorMessage."<li>Email is missing</li>";
 
    }
    if(empty($postalcode)){

        $errorMessage = $errorMessage."<li>Postal code is missing</li>";
 
    }

    if(empty($state)){

        $errorMessage = $errorMessage."<li>State name is missing</li>";
 
    }

    if(empty($city)){

        $errorMessage = $errorMessage."<li>City name is missing</li>";
 
    }

    if(empty($verifyRecaptchaToken)){

        $errorMessage = $errorMessage."<li>Re-captcha Token is missing</li>";
 
    }
    

    // PATTERN VALIDATIONS
 
    if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
        $errorMessage = $errorMessage."<li>First Name - Only letters and white space allowed</li>";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
        $errorMessage = $errorMessage."<li>Last Name - Only letters and white space allowed</li>";
    }


    if(!preg_match('/^([A-Z])([0-9])([A-Z])([0-9])([A-Z])([0-9])$/', strtoupper($postalcode))){

        $errorMessage = $errorMessage."<li>Invalid Postal Code</li>";
     
    }


    // WRONG STATE NAME

    $stateArray = array("Alberta", 
                    "British Columbia", 
                    "Manitoba", 
                    "New Brunswick", 
                    "NewFoundland and Labrador", 
                    "Nova Scotia", 
                    "Northwest Territory", 
                    "Nunavut Territory", 
                    "Ontario", 
                    "Prince Edward Island", 
                    "Quebec", 
                    "Saskatchewan", 
                    "Yukon");

    if (!in_array($state, $stateArray))
    {
        $errorMessage = $errorMessage."<li>Invalid State Name. Please choose state from dropdown only.</li>";
    }



    // CHECK POSTAL CODE IN SPECIFIED STATE

    $postalCode3L = substr($postalcode, 0, 3);

    $postalCode3L = strtoupper($postalCode3L);

    $checkPostalCodeFileName = "text__files__postalcodes/".$state.".txt";

    if(!exec('grep '.escapeshellarg($postalCode3L).' '.escapeshellarg($checkPostalCodeFileName))) {

        $errorMessage = $errorMessage."<li>City doesn't exist in ".$state.". Please check your postal code again.</li>";

    }

    if($errorMessage !== ""){

        $_SESSION['errorMsg'] = $errorMessage;
        header('Location: index.php');
        exit();   

    }



    // if(!filter_var($_POST['firstname'], FILTER_SANITIZE_STRING)){

    //     echo $errorMessage;

    // }



    // SESSION START


    $_SESSION['phonenumber'] = $phonenumber;

    
    include('../checkpreviousorder.php');


//     $firstname = trim(htmlentities(strip_tags($firstname)));
//     $lastname = trim(htmlentities(strip_tags($lastname)));
//     $phonenumber = trim(htmlentities(strip_tags($phonenumber)));
//     $address1 = trim(htmlentities(strip_tags($address1)));
//     $address2 = trim(htmlentities(strip_tags($address2)));
//     $landmark = trim(htmlentities(strip_tags($landmark)));
//     $email = trim(htmlentities(strip_tags($email)));
//     $postalcode = trim(htmlentities(strip_tags($postalcode)));


    $out = shell_exec('curl -X POST \'https://www.googleapis.com/identitytoolkit/v3/relyingparty/sendVerificationCode?key=SERVER_API_KEY\' -H \'content-type: application/json\' -d \'{"phoneNumber": "+1'.$phonenumber.'", "recaptchaToken": "'.$verifyRecaptchaToken.'"}\'');

     if (strpos($out, 'ATTEMPTS') !== false) {
        header('Location: 400_TMA.php');
        exit();   
     }
     else if (strpos($out, 'INVALID_PHONE_NUMBER') !== false) {
        $_SESSION['invalid_phone_number'] = "invalid_phone_number";
        header('Location: index.php');
        exit();   
     }
     

    $jsonArray = json_decode($out, true);

    $key = "sessionInfo";

    $session_info_token = $jsonArray[$key];

	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "u549416580_orderfreegita";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error(). '. Please try again later.');
    }else{

        try {

            $insert = "INSERT INTO pending_orders (first_name, 
            last_name, phonenumber, address_1, address_2, landmark, state_name, city_name, email, postal_code, 
            phone_number_status, email_status, session_token, email_token) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $con->prepare($insert);
     
            $pending = "pending";
            
           $stmt->bind_param("ssssssssssssss",  $firstname,
                                                $lastname, 
                                                $phonenumber, 
                                                $address1, 
                                                $address2, 
                                                $landmark, 
                                                $state, 
                                                $city, 
                                                $email, 
                                                $postalcode, 
                                                $pending, 
                                                $pending,
                                                $session_info_token,
                                                $pending
                                            );
                                                                            
            
            $stmt->execute();

            $stmt->close();


        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
            exit();
        }

        $con->close();

        header('Location: ../otpverification/index.php');
        exit();

    }

   
}


?>



