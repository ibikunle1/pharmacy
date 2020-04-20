<?php
include('function.php');
if (!(isset ($_SESSION["email"]))) {
    $email =  $_SESSION["email"];
    header('location:login.php');
}
    if ((isset ($_SESSION["email"])) and (isset ($_SESSION["password"]))){
        $email =  $_SESSION["email"];
        $select = "SELECT * FROM user where email='$email' LIMIT 1";
        $query= mysqli_query($connect, $select);
        $get = mysqli_fetch_array($query);
        $username = $get['name'];
    }
    if(isset($_POST['search'])){
        $valueTosearch = $_POST{'valueTosearch'};
        $query = "SELECT * FROM `products` WHERE CONCAT(`name`, `serial`) LIKE '%" .$valueTosearch. "%' ";
        $search_result = mysqli_query($connect, $query);
    }
    else{
        $query = "SELECT * FROM `products`";
        $search_result = mysqli_query($connect, $query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="site-wrap">
        <div class="site-navbar py-2" style="font-family:'Times New Roman', Times, serif">
        <div class="search-wrap">
            <div class="container">
                <form action="" method="post" class="form-inline mt-3">
                  <div class="input-group input-group-sm col-md-12">
                    <input type="text" name="valueTosearch" class="form-control" placeholder="Search product item here...">
                    <div class=" input-group-append ">
                        <button class="btn btn-success" name="search" type="button ">Search</button>
                    </div>
                 </div>
                </form>
                </div>
        </div>
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
                                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                                <li class="has-children">
                                    <a href="#">Products</a>
                                    <ul class="dropdown">
                                        <li><a href="update.php">Add-Product</a></li>
                                        <li><a href="upload.php">New-Product</a></li>
                                    </ul>
                                <li><a href="logout.php">Log-out</a></li> 
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class="container">

                <div class="row">
                    
                    <?php while ($get=mysqli_fetch_array($search_result)){
                        echo "<div class='col-sm-6 col-lg-4 text-center item mb-4'>";
                        $id = $get['id'];
                        $name = $get['name'];
                        $serial = $get['serial'];
                        $price = $get['price'];
                        $image = $get['image'];
                        $quantity = $get['quantity'];
                        echo "<a href='shop.php?item=$id'><img src = $image height ='400px' alt='$name'>";
                        echo "<h5 class='text-dark'>".$name."</a></h5>";
                        echo "<div class='text-dark'>".$serial."</div>";
                        echo "<div class='text-dark'>Price: " .$price."</div>";
                        echo "<p class='text-dark'>Quantity Remaining: " .$quantity. " </p>";
                        echo "</div>";
                    }
                    ?>
                   
                </div>
            </div>
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
</html>