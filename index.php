<?php
include('function.php');
$select = "SELECT * FROM products LIMIT 4";
$query= mysqli_query($connect, $select);

if(isset($_POST['search'])){
	$valueTosearch = $_POST{'valueTosearch'};
	$query = "SELECT * FROM `products` WHERE CONCAT(`name`, `serial`) LIKE '%" .$valueTosearch. "%' ";
	$search_result = mysqli_query($connect, $query);
}
else{
	$query =  "SELECT * FROM products LIMIT 4";
	$search_result = mysqli_query($connect, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Planex Pharmacy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                <form action="" method="post" class="mt-3">
                <div class="input-group input-group-sm col-md-12">
                    <input type="text" name="valueTosearch" class="form-control" placeholder="Search product item...">
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
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="product.php">Product</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
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

        <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');opacity:0.7;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                        <div class="site-block-cover-content text-center"style="color:black">
                        <h1>Welcome To Planex</h1>
                        <h2 class="sub-title" style="color:black"><b>Effective Medicine, New Medicine Everyday</b></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container jumbotron">
                <div class="row">
                    <div class="title-section text-center col-12">
                        <h2 class="text-uppercase">Products</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 block-3 products-wrap">
                        <div class="nonloop-block-3 owl-carousel">
                            <?php while ($get=mysqli_fetch_array($search_result)){
                                echo "<div class='text-center item mb-4'>";
                                $id = $get['id'];
                                $name = $get['name'];
                                $image = $get['image'];
                                echo "<a href='shop.php?item=$id'><img src = $image height ='400px' alt='$name'>";
                                echo "<h5 class='text-dark'>".$name."</a></h5>";
                                echo "</div>";
                                }
                            ?>
                        </div>
                        <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                        <div class="site-block-cover-content text-center">
                        <p>
                            <a href="product.php" class="btn btn-primary px-5 py-3">More Product</a>
                        </p>
                        </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-primary bg-image">
            <div class="container">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
                            <div class="banner-1-inner align-self-center">
                                <h2>Planex Products</h2>
                                <p>Planex Products has proven to be the best product by virtue of the NCDC.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
                            <div class="banner-1-inner ml-auto  align-self-center">
                                <h2>Rated by Experts</h2>
                                <p>The products sold here as be confirmed and tested OK by various medical practisioners before been put forward for sell. Otherwise the product would be returned.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                        <div class="block-7">
                            <h3 class="footer-heading mb-4">About Us</h3>
                            <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: gray">Planex Pharmacy is one of the best pharmarcy in the country and has its branches in various states.</p>
                        </div>
                        <a href="about.php"><button type="button" class="btn btn-secondary">More</button></a>
                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="product.php">Product</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address">Shop 44, ikeja city mall, ikeja lagos.</li>
                                <li class="phone"><a href="tel://2348102515228">+234 810 251 5228</a></li>
                                <li class="email">planexpharmacy@email.com</li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <p>
                            Copyright &copy; 2020. All rights reserved | planexpharmacy.
                        </p>
                    </div>

                </div>
            </div>
        </footer>
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