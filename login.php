<?php
  session_start();
  if(!empty($_SESSION['user'])){
    header("Location: index.php");
  }
?>
<?PHP
  include 'conn.php';
// Define valid credentials

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["mail"]))){
      echo "<script>alert('Please Enter Email!');</script>";
    } else{
        $username = trim($_POST["mail"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
      echo "<script>alert('Please Enter password!');</script>";;
    } else{
        $password = trim($_POST["pass"]);
    }
    
    // Validate credentials
    if($username !="" && $password!=""){
      $sql = "SELECT * FROM `user_details` WHERE `email` = '$username' AND `pswrd` = '$password'  LIMIT 1";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        
        while ($row = mysqli_fetch_assoc($result)) {
          $valid_username = $row['email'];
          $valid_password = $row['pswrd'];
        // Check if username and password match the predefined credentials
        if($username === $valid_username && $password === $valid_password){
                            
            // Store data in session variables
            $_SESSION["user"] = $row['sno'];                            
                            
            // Redirect user to welcome page
            if($row['typ'] == 1){
              header("location: /thoth-new/das/dashboard/index.php");  
            }else{
              header("location: index.php");
            }
        } else{
            // Display an error message if username or password is incorrect
            echo "<script>alert('Invalid Email or Password');</script>";
        }
    }
}
else{
  // Display an error message if username or password is incorrect
  echo "<script>alert('Invalid Email or Password');</script>";
}
}
else{
  // Display an error message if username or password is incorrect
  echo "<script>alert('Invalid Email or Password');</script>";
}
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
<script nonce="a6d086bf-f410-4a35-9515-1d296328228c">try { (function(w,d){!function(o,p,q,r){o[q]=o[q]||{};o[q].executed=[];o.zaraz={deferred:[],listeners:[]};o.zaraz.q=[];o.zaraz._f=function(s){return async function(){var t=Array.prototype.slice.call(arguments);o.zaraz.q.push({m:s,a:t})}};for(const u of["track","set","debug"])o.zaraz[u]=o.zaraz._f(u);o.zaraz.init=()=>{var v=p.getElementsByTagName(r)[0],w=p.createElement(r),x=p.getElementsByTagName("title")[0];x&&(o[q].t=p.getElementsByTagName("title")[0].text);o[q].x=Math.random();o[q].w=o.screen.width;o[q].h=o.screen.height;o[q].j=o.innerHeight;o[q].e=o.innerWidth;o[q].l=o.location.href;o[q].r=p.referrer;o[q].k=o.screen.colorDepth;o[q].n=p.characterSet;o[q].o=(new Date).getTimezoneOffset();if(o.dataLayer)for(const B of Object.entries(Object.entries(dataLayer).reduce(((C,D)=>({...C[1],...D[1]})),{})))zaraz.set(B[0],B[1],{scope:"page"});o[q].q=[];for(;o.zaraz.q.length;){const E=o.zaraz.q.shift();o[q].q.push(E)}w.defer=!0;for(const F of[localStorage,sessionStorage])Object.keys(F||{}).filter((H=>H.startsWith("_zaraz_"))).forEach((G=>{try{o[q]["z_"+G.slice(7)]=JSON.parse(F.getItem(G))}catch{o[q]["z_"+G.slice(7)]=F.getItem(G)}}));w.referrerPolicy="origin";w.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(o[q])));v.parentNode.insertBefore(w,v)};["complete","interactive"].includes(p.readyState)?zaraz.init():o.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document) } catch (err) {
      console.error('Failed to run Cloudflare Zaraz: ', err)
      fetch('/cdn-cgi/zaraz/t', {
        credentials: 'include',
        keepalive: true,
        method: 'GET',
      })
    };</script></head>
<body>
<header>
<div class="header-area">
<div class="main-header header-sticky">
<div class="container-fluid">
<div class="menu-wrapper d-flex align-items-center justify-content-between">
<div class="left-content d-flex align-items-center">
<div class="logo">
<a href="index.php"><img src="assets/img/logo/logo.png" alt></a>
<form action="#" class="form-box">
<input type="text" name="Search" placeholder="Search your path..">
<div class="search-icon">
<i class="ti-search"></i>
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
<a href="login.php" class="btn header-btn2">Sign In</a>
</li>
<li>
<a href="register.php" class="btn header-btn2">Sign UP</a>
</li>
</ul>
</nav>
</div>
</div>

</div>


<div class="main-menu d-none d-lg-block">
<nav>
</nav>
</div>
</div>

<div class="col-12">
<div class="mobile_menu d-block d-lg-none"></div>
</div>
</div>
</div>
</div>
</header>
<main>

<section class="about-area2 section-padding">
<div class="container">
<div class="row align-items-center ">
<div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12">

<div class="about-img about-img1  ">
<img src="assets/img/gallery/career_guidance.jpg" alt>
</div>
</div>
<div class="offset-xxl-1 col-xxl-5 col-xl-7 col-lg-6 col-md-12">
<div class="about-caption about-caption1">
    <div class="register-form-area">
<div class="register-form text-center">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
<div class="login-heading">
<span>Login</span>
<p>Enter Login details to get access</p>
</div>

<div class="input-box">
<div class="single-input-fields">
<label>Username or Email Address</label>
<input type="text" name="mail" placeholder="Username / Email address">
</div>
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="pass" placeholder="Enter Password">
</div>
</div>

<div class="register-footer">
<p> Don’t have an account? <a href="register.php"> Register</a> here</p>
<input type="submit" class="submit-btn3">
</div>

</form>
</div>
</div>
<script>
    function validateForm() {
      var email = document.forms["myForm"]["email"].value;
      var password = document.forms["myForm"]["psw"].value;

      if (email == "" || password == "") {
        alert("Please fill out all fields");
        return false;
      }
    }

    <?php
      if (isset($_SESSION['wrong_credentials']) && $_SESSION['wrong_credentials']) {
        echo 'document.getElementById("popup").style.display = "block";';
        unset($_SESSION['wrong_credentials']);
      }
    ?>
  </script>

<script>
    // Function to hide the element with a specific ID
    function removePopup() {
      var x = document.getElementById('popup');

      if (x) {
        x.style.display = 'none';
      }
    }
  </script>





</div>
</div>
</div>
</section>
</main><?PHP include 'footer.php';?>