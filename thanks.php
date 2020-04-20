<?php
session_start();
$error=$error1=$error2="";
if (!(isset ($_SESSION["email"]))) {
    $email =  $_SESSION["email"];
    header('location:login.php');
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
                                        <li ><a href="update.php">Add-Product</a></li>
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

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> 
         <strong class="text-black">Thanks.</strong></div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">You order was successfuly completed.</p>
            <p><a href="dashboard.php" class="btn btn-md height-auto px-4 py-3 btn-primary">Back to home</a></p>
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