<?php
include('../function.php');
$date = date("d:M:Y");
$error=$error1=$error2="";
if (!(isset ($_SESSION["email"]))) {
    $email =  $_SESSION["email"];
    header('location:../login.php');
}
    $select = "SELECT * FROM user";
    $query= mysqli_query($connect, $select);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
        <style>
            header {
                background-color: darkslategray;
                color: darkorange;
            }
            
        </style>
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
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li class="active"><a href="status.php">Staff</a></li> 
                                <li class="has-children">
                                    <a href="#">More</a>
                                    <ul class="dropdown">
                                        <li ><a href="update.php">Add-Product</a></li>
                                        <li><a href="upload.php">New-Product</a></li>
                                        <li><a href="create.php">Add-user +</a></li>
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
        <h2> Staff Information</h2>
        <table class="table table-bordered table-hover table-striped">
			<tr><th>S/N</th>
				<th>Name</th>
				<th >Email</th>
				<th>Action</th>
			</tr>
			<?php
			$y=0;
			while ($data = mysqli_fetch_array($query)){ 
				$id = $data['id'];
				echo "<tr><td>" .++$y. "</td><td>" . $data['name'] . "</td><td>" . $data['email'] . "</td><td><a class='btn btn-success' href='sells.php?staff=$id'> Sales </a></td><tr>";
				}
			?>
    	</table>
        <h2> Today's Sales</h2>
        <?php
        $verify = "SELECT * FROM sells WHERE date ='$date' ";
        $check= mysqli_query($connect, $verify);
        ?>
        <table class="table table-bordered table-hover table-striped">
			<tr><th>S/N</th>
				<th>Sales Personnel</th>
				<th >Item Sold</th>
				<th>Qunatity</th>
				<th>Time</th>
			</tr>
			<?php
			$y=0;
			while ($data = mysqli_fetch_array($check)){ 
				$id = $data['id'];
				echo "<tr><td>" .++$y. "</td><td>" . $data['name'] . "</td><td>" . $data['item_name'] . "</td><td>" . $data['quantity'] . "</td><td>" . $data['time'] . "</td><tr>";
				}
			?>
			
    	</table>
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