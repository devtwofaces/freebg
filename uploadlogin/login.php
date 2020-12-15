<?php 


if(isset($_POST['username']) and isset($_POST['password'])){

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);


    $username = trim(htmlentities(strip_tags($username)));
    $password = trim(htmlentities(strip_tags($password)));

    echo $username." ".$password;


    if($username=="admin" && $password=="admin"){
        $_SESSION['onlyadminsallowed']=$username;
        header("location:../uploadquotes/");

    }
    else{
        header("location:index.php");
    }



}
else{

    echo "NO BOBO";
}




?>