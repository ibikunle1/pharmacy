<?php
session_start();
$error1=$error2=$error3=$email=$password=$error="";
$connect = mysqli_connect("localhost", "root", "", "pharmacy") or die ("unable to connect");
if((isset($_POST['email'])) and (isset($_POST['password']))){
    $email = $_POST['email'];
    $password = $_POST['password'];  
    if (empty($email)){
        $error = "Enter email!!";
    }
    if (empty($password)){
        $error1 = "Enter Password!!";
    }
$select = "SELECT * FROM user where email='$email' and password='$password'";
$query = mysqli_query($connect,$select);
if (mysqli_num_rows($query) == 1) { // user found
    // check if user is admin or user
    $logged_in_user = mysqli_fetch_array($query);
    if ($logged_in_user['user_type'] == 'admin') {
        $_SESSION['email'] = $email;
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['log']  = "You are now logged in";
        header('location: admin/dashboard.php');		  
    }else{
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['email'] = $email;
        $_SESSION['log']  = "You are now logged in";
        header('location: dashboard.php');
    }
}else {
    $error3 = "Invalid Entry/Wrong combination";
}
}
/*$Email = $check['email'];
$Password = $check['password'];
if($Email != $email){
    $error1 = "Invalid email!!"; 
}
if ($Password != $password){
    $error2 = "Wrong password!!";
}
if(!$email and !$password){
    $error ="Enter email/Password";
}
if(($Email != $email) and ($Password != $password)){
    $error3 = "Invalid Entry/Wrong combination";
}
if ((!$error1) and (!$error2) and (!$error3) and (!empty($email)) and (!empty($password))){
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    header('location:dashboard.php');
}*/
?>