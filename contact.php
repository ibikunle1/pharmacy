<?php
$error ="";
if ($_SERVER['REQUEST_METHOD']==="POST"){
    if (empty($_POST['email'])){
        $e_error="Email is empty";
    }
    else{
        $email = $_POST['email'];
    
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailError = "Invalid email";
        }
    }
    if (empty($_POST['name'])){
        $n_error = "Name is empty";
    }else{
        $name = $_POST['name'];
    }
    if (empty($_POST['subject'])){
        $s_error = "Message subject is empty";
    }else{
        $sub = $_POST['subject'];
    }
    if (empty($_POST['message'])){
        $m_error = "Message box is empty";
    }else{
        $message = $_POST['message'];
    }
    if (empty($e_error) || empty($n_error)|| empty($s_error) || empty($m_error)){
        $date = date("d:m:Y, h:i:sa");
        $emailBody ="
        <html>
        <head>
        <title> $email is contacting you </title>
        </head>
        <body style=\"backgroung-color:#fafafa;\">
        <div style =\"padding: 20px;\">
        Date: <span style =\"color: #888;\">$date</span>
        Email: <span style =\"color: #888;\">$email</span>
        Subject: <span style =\"color: #888;\">$sub</span>
        Message: <span style =\"color: #888;\">$message</span>
        </div>
        </body>
        </html>
        ";
        $myemail = 'teejohnson356@gmail.com';
        $headers = 'From: '.$myemail."\r\n".
        "Reply-To: $email". "\r\n" . 
        "MIME-version: 1.0\r\n" .
        "Content-Type:text/html; charset=iso-8859-1\r\n";
        $to = $myemail;
        $subject = $sub;
        if (mail($to, $subject, $emailBody, $headers)){
            $sent = true;
        }
        else{
            $error = "Unable to submit your response, Please try again.";
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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="product.php">Product</a></li>
                                <li><a href="about.php">About</a></li>
                                <li class="active"><a href="contact.php">Contact</a></li>
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
                    <div class="col-md-12 mb-0">
                        <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Contact</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container jumbotron">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="h3 mb-5 text-black">Get In Touch</h2>
                    </div>
                    <div class="col-md-12">

                        <form action="" method="post">

                            <div class="p-3 p-lg-5 border">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="name" class="text-black">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="c_email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_subject" class="text-black">Subject </label>
                                        <input type="text" class="form-control" id="c_subject" name="subject">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_message" class="text-black">Message </label>
                                        <textarea name="message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php 
    if (isset($e_error) && isset($n_error) && isset($s_error) && isset($m_error)):?>
    <div id = "error-message">
    <?php
        echo  $e_error;
        echo  $n_error;
        echo $s_error;
        echo $m_error;
    ?>
    </div>
    <?php endif;?>
    <?php 
    echo $error;
    if (isset($sent)&& $sent ===true):?>
    <div id = "done-message">
    Your data was succesfully submitted
    </div>
    <?php endif;?>
                </div>
            </div>
        </div>



        <div class="site-section bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-white mb-4">Offices</h2>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 bg-white mb-3 rounded">
                            <span class="d-block text-black h6 text-uppercase">Ikeja</span>
                            <p class="mb-0">Shop 44, ikeja city mall, ikeja lagos.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 bg-white mb-3 rounded">
                            <span class="d-block text-black h6 text-uppercase">Iyana-ipaja</span>
                            <p class="mb-0">No 13, abule street, makoko, Iyana-ipaja, Lagos.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 bg-white mb-3 rounded">
                            <span class="d-block text-black h6 text-uppercase">Yaba</span>
                            <p class="mb-0">Shop 14, Bassie Ogamba street, Yaba, Lagos. </p>
                        </div>
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