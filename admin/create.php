<?php
include('../function.php');
if (!(isset ($_SESSION["email"]))) {
    $email =  $_SESSION["email"];
    header('location:../login.php');
}

if((isset($_POST["name"])) and (isset($_POST["email"])) and (isset($_POST["password"])) and (isset($_POST["user_type"]))){
    if (empty($_POST["name"])){
        $nameErr = "Your name is required";
    } $name = ($_POST["name"]);
    if (empty($_POST["password"])){
        $passwordErr = "Password Required";
    } $password = ($_POST["password"]);
    if (empty($_POST["email"])){
        $emailErr = "Your email is required";
    } $email = ($_POST["email"]);
    if (empty($_POST["user_type"])){
        $error = "Select user type ";
    } $user = ($_POST["user_type"]);
    if(! empty($name) and ! empty($password) and ! empty($email) and ! empty($user) ){
        $insert = "INSERT INTO user (name, email, user_type, password) VALUES('$name', '$email', '$user', '$password')";
        if (mysqli_query($connect, $insert)){
			$_SESSION['log']  = "New user successfully created!!";
            header('location:../login.php');
        }
    }
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create-User</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="site-wrap">
        <div class="site-navbar py-2" style="font-family:'Times New Roman', Times, serif">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="../index.php" class="js-logo-clone">Planex</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li ><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="status.php">Staff</a></li> 
                                <li class="has-children">
                                    <a href="#">More</a>
                                    <ul class="dropdown">
                                        <li><a href="update.php">Add-Product</a></li>
                                        <li><a href="upload.php">New-Product</a></li>
                                        <li class="active"><a href="create.php">Add-user +</a></li>
                                    </ul>
                                <li><a href="../logout.php">Log-out</a></li> 
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
		<h2>Admin - create user</h2>
 	    <form method="post" action="" class="form-group">
		<div class="form-group">
			<label>Full-Name:</label> 
			<input type="text" class="form-control border-top border-left border-right" name="name" value="">
        </div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" value="" class="form-control border-top border-left border-right">
		</div>
		<div class="form-group">
			<label>User type</label>
			<select name="user_type" id="user_type" class="form-control border-top border-left border-right">
				<option value="" selected disabled></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control border-top border-left border-right">
		</div>
		<div class="form-group">
			<button type="submit" name="register_btn" class="form-control btn btn-success"> + Create user</button>
		</div>
	</form>
</div>
</div>
   <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>