<?php
include('function.php');
if (!(isset ($_SESSION["email"]))) {
    $email =  $_SESSION["email"];
    header('location:login.php');
}
$new=$failure=$success="";
	$query = "SELECT DISTINCT name FROM products ORDER BY name ASC";
    $log = mysqli_query($connect, $query);
    
if ((isset($_POST['name']))and(isset($_POST['price']))and(isset($_POST['quantity']))){
    if (empty($_POST["name"])){
        $error = "";
    } $name = ($_POST['name']);
    if (empty($_POST["price"])){
    $error1 = "Product price is required";
    } $price = ($_POST["price"]);
    if (empty($_POST["quantity"])){
    $error2 = "Product quantity is required";
    } $quantity2 = ($_POST["quantity"]);
    $select = "SELECT * FROM products WHERE name ='$name'";
    $query= mysqli_query($connect, $select);
    $get = mysqli_fetch_array($query);
    $quantity = $get['quantity'];
    $new = $quantity + $quantity2;
    $update = "UPDATE products SET quantity ='$new', price ='$price' WHERE name ='$name' LIMIT 1";
    if (mysqli_query($connect, $update)){
        $success = "Your Product have been updated Successfully";
    } else {
        $failure = "Error updating product, Please check and try again!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
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
                            <a href="index.php" class="js-logo-clone">Planex</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li class="has-children">
                                    <a href="#">Products</a>
                                    <ul class="dropdown">
                                        <li class="active"><a href="update.php">Add-Product</a></li>
                                        <li><a href="upload.php">New-Product</a></li>
                                    </ul>
                                <li><a href="logout.php">Log-out</a></li> 
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>
<div style="margin-left:25%; margin-right:20%; margin-top:50px;">
    <form class="form-group" method="post" action="">
        <div class="form-row">
            <div class="col-md-12">
                <select name="name" class="custom-select">
			    <option selected>Select product name</option>
			     <?php while($logg = mysqli_fetch_assoc($log)):;?>
					<option value="<?php echo $logg['name']?>" ><?php echo $logg['name'];?></option>
				<?php endwhile;?>
			    </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12">
            <label>Price:  &nbsp;&nbsp;</label> <input type="text" required class="form-control border-top border-left border-right" name="price"><br>
            </div>
         </div>
         <div class="form-row">
            <div class="col-md-12">
            <label>Quantity:  &nbsp;&nbsp;</label> <input type="text" required class="form-control border-top border-left border-right" name="quantity"><br>
            </div>
        </div>
    <button type="submit" class="btn btn-info form-control mt-4"> Register </button></div>
    <?php echo $error; echo "<p>"; echo $error1; echo "<p>"; echo $error2;echo "<p>"; echo $failure;echo "<p>"; echo $success;?>
    </form>
</div>      
</div>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>