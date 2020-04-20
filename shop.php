<?php
include('function.php');
$new=$failure=$success=$amtErr="";
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
    if (isset($_GET['item'])){
      $item = ($_GET['item']);
      $select = "SELECT * FROM products WHERE id ='$item'";
      $query= mysqli_query($connect, $select);
      $get = mysqli_fetch_array($query);
      $name = $get['name'];
      $image = $get['image'];
      $serial = $get['serial'];
      $price = $get['price'];
      $quantity = $get['quantity'];
    }
if (isset($_POST['amount'])){
  if (empty($_POST["amount"])){
    $amtErr = "product quantity is required";
} $amount = $_POST['amount'];
  $new = $quantity - $amount;
  $date =  date("d:M:Y");
  $time = date("H:i:sa");
  if (!empty($amount)){
  $insert= "INSERT INTO `sells`(`name`, `item_name`, `quantity`, `date`, `time`) VALUES ('$username','$name','$amount','$date','$time')";
  $update= "UPDATE products SET quantity ='$new' where id ='$item' ";
  if ((mysqli_query($connect, $insert)) and (mysqli_query($connect, $update))){
    header('location: thanks.php');
  } 
 else {
      $failure = "Unable to complete transaction, Please Try Again!!!";
  }
}
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
                                <li><a href="logout.php'">Log-out</a></li> 
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
          <a href="product.php">Product</a> <span class="mx-2 mb-0">/</span>
          <a href="dashboard.php">Dashboard</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $name; ?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <?php echo "<img src = $image height ='400px' alt='$name'>";?>
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $name; ?></h2>
            <p><?php echo $serial; ?></p>
            <p><strong class="text-primary h4"><?php echo $price; ?></strong></p>
            <div class="mb-5">
              <form class="input-group mb-3" style="max-width: 220px;" method="post" action="">
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input name="amount" type="text" id="quantity" placeholder="Please specify..." class="form-control">
                </select>
                </div>
                <p class="mt-4">
                  <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">BUY</button>
                </p>
                <?php echo $success; echo $failure; echo $amtErr;?>
              </form>
    
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