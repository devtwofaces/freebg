<?php

  session_start();

  if(!isset($_SESSION['phonenumber'])){

    header('Location: ../orderfreegita/');
    exit();
  
  }

  $phoneNumber_session =  $_SESSION['phonenumber'];

  // DB CONNECTION

  $servername = "localhost";
  $username = "";
  $password = "";
  $dbname = "u549416580_orderfreegita";

$conCPO = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error(). '. Please try again later.');
}else{

    try {

        $fetchVerified = "SELECT * FROM verified_orders WHERE phonenumber=?";
                    
        $stmtCPO = $conCPO->prepare($fetchVerified);

        $stmtCPO->bind_param("s", $phoneNumber_session);

        $stmtCPO->execute();

        $result = $stmtCPO->get_result();

        if($result->num_rows === 0){
        $stmtCPO->close();
        }
        else{    
        $stmtCPO->close();
        header('Location: ../orderexists.php');
        exit();
        }

    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
        exit();
    }

}


$conCPO->close();



?>