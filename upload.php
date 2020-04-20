<?php
session_start();
$error=$error1=$error2="";
if (!(isset ($_SESSION["email"]))) {
    $email =  $_SESSION["email"];
    header('location:login.php');
}
    $mysqli = new mysqli('localhost', 'root', '', 'pharmacy') or die($mysqli -> connect_error);
    $table = 'products';
    $phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary file',
    7 => 'Failed to write file to disk',
    8 => 'A PHP extention stopped the file upload.',
);
 if ((isset($_FILES['userfile'])) and (isset($_POST["serial"])) and (isset($_POST["price"])) and (isset($_POST["quantity"]))){
    if (empty($_POST["serial"])){
        $error = "Enter product serial no.";
    } $serial = $_POST["serial"];
    if (empty($_POST["price"])){
        $error1 = "Enter product price.";
    } $price = $_POST["price"];
    if (empty($_POST["quantity"])){
        $error2 = "Enter product quantity.";
    } $quantity = $_POST["quantity"];
     $file_array = reArrayFiles($_FILES['userfile']);
     for($i = 0; $i<count($file_array); $i++){
         if($file_array[$i]['error']){
             ?><div class="alert alert-danger">
             <?php echo $file_array[$i]['name']. '-' .$phpFileUploadErrors[$file_array[$i]['error']];
             ?></div> <?php
         } else{
             $extentions = array ('jpg', 'png', 'gif', 'jpeg', 'JPEG', 'JPG', 'PNG', 'GIF');
             $file_ext = explode('.', $file_array[$i]['name']);
             $name = $file_ext[0] ;
            $name = preg_replace("!-!", "_", $name);
            $name = ucwords($name);
             $file_ext = end($file_ext);
             if(!in_array($file_ext, $extentions)){
                ?><div class="alert alert-danger">
                <?php echo "{$file_array[$i]['name']} - Invalid file extension";
                ?></div> <?php
             } else {
                 $img_dir = 'web/' .$file_array[$i]['name'];
                 move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);
                 $sql = "INSERT INTO $table(name, image, serial, price, quantity) VALUES('$name', '$img_dir', '$serial', '$price', '$quantity')";
                 $mysqli -> query($sql) or die ($mysqli -> error);
                 ?><div class="alert alert-success">
                 <?php echo $file_array[$i]['name']. '-' .$phpFileUploadErrors[$file_array[$i]['error']];
             }
         }
     }
 }
 
function reArrayFiles(&$file_post){
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++){
        foreach ($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '<pre>';
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
                                        <li><a href="update.php">Add-Product</a></li>
                                        <li class="active"><a href="upload.php">New-Product</a></li>
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
    <form class="form-group" method="post" action="" enctype="multipart/form-data">
       
        <div class="form-row">
            <div class="col-md-12">
            <label>Serial No:  &nbsp;&nbsp;</label> <input type="text" required class="form-control border-top border-left border-right" name="serial"><br>
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
        <div class="custom-file">
            <input type="file" name="userfile[]" class="custom-file-input" id="customeFile">
            <label class="custom-file-label" for ="customFile">Choose file<label>
        </div>
    <button type="submit" class="btn btn-info form-control mt-4"> Register </button></div>
    <?php echo $error; echo "<p>"; echo $error1; echo "<p>"; echo $error2;?>
    </form>
</div>      
        <script>
            $(".custom-file-input").on("change", function(){
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
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

