<?php
include('conn.php');
  session_start();
  if(!empty($_SESSION['user'])){
    $sno = $_SESSION['user'];
  }
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>THOTH</title>
<meta name="description" content>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logoo.png">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/slicknav.css">
<link rel="stylesheet" href="assets/css/flaticon.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/nice-select.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
<div class="header-area">
<div class="main-header header-sticky">
<div class="container-fluid">
<div class="menu-wrapper d-flex align-items-center justify-content-between">
<div class="left-content d-flex align-items-center">
<div class="logo">
<a href="index.php"><img src="assets/img/logo/thothlogo.png" alt="logo" style="width: 100px; height: 90px;"></a>
</div>

<form action="search.php" method="get" id="form-box" class="form-box">
<input type="text" name="Q" placeholder="Search your path..">
<div class="search-icon">
<a href="#" onclick="document.getElementById('form-box').submit(); return false;" ><i class="ti-search"></i></a>
</div>
</form>
</div>

<div class="main-menu d-none d-lg-block">
<nav>
<ul id="navigation">
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="services.php">Services</a></li>
<li><a href="Roadmaps.php">Roadmaps</a></li>
<li><a href="jobs.php">Jobs</a></li>
<li><a href="contact.php">Contact</a></li>
<li>
    <?php
        if(!empty($sno)){
            $sql = "SELECT `roll` FROM `user_details` WHERE `sno` = '$sno'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<a href="logout.php">'.$row['roll'].'</a>';
        }else{
            echo '<a href="login.php" class="btn header-btn2">Sign In</a>';
        }
    ?>
</li>
</ul>
</nav>
</div>
</div>
</div>
</div>
</header>