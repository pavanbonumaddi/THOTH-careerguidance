<?php
  session_start();
  if(!empty($_SESSION['user'])){
    header("Location: index.php");
  }
?>

<?php
    include 'conn.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $roll = $_POST['roll_no'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $pswrd = $_POST['password'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $phnno = $_POST['phone_no'];

        echo "Inserting";
        
        $sql = "INSERT INTO `user_details` (`name`, `roll`, `branch`, `email`, `pswrd`, `dob`, `gender`, `phno`, `typ`) VALUES ('$name', '$roll', '$branch', '$email', '$pswrd', '$dob', '$gender', '$phnno', '2')";
        
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
      echo "<script>alert('Enter All the Required Details');</script>";
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
<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .warning {
            color: red;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            border-radius: 8px;    
        }
        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }
        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #3419ae;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #3419ae;
        }

        img {
            max-width: 100%;
            height: 12%;
        }

        #before-page-link {
            position: fixed;
            bottom: 10px;
            left: 10px;
        }
    </style>
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
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="role">Roll no:</label>
            <input type="text" id="role" name="roll_no" required>

            <label for="branch">Branch:</label>
            <input type="text" id="branch" name="branch" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" oninput="validateEmail();" required>
            <div id="warning" class="warning" style="display:none;">Use @adityatekkali.edu.in</div>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            </select>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone_no" required>

            <input type="submit" value="Register">
</form>
<script>
    function validateEmail() {
      var emailInput = document.getElementById('email');
      var emailPattern = /^[a-zA-Z0-9._-]+@adityatekkali\.edu\.in$/;

      if (!emailPattern.test(emailInput.value)) {
        document.getElementById('warning').style.display = 'block';
        return false;
      } else {
        document.getElementById('warning').style.display = 'none';
        return true;
      }
    }
  </script>

</div>
</div>






</div>
</div>
</div>
</section>
</main>
<footer>
    <div class="footer-area footer-padding">
    <div class="footer-wrapper ">
    <div class="container">
    <div class="row d-flex justify-content-between">
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="single-footer-caption mb-50">
    <div class="single-footer-caption mb-30">
    
    <div class="footer-logo mb-25">
    <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt></a>
    </div>
    <div class="footer-tittle">
    <div class="footer-pera">
    </div>
    </div>
    
    <div class="footer-social">
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-pinterest-p"></i></a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
    <div class="single-footer-caption mb-50">
    <div class="footer-tittle">
    </div>
    </div>
    
    
    
    <div class="footer-bottom-area">
    <div class="container">
    <div class="footer-border">
    <div class="row d-flex align-items-center">
    <div class="col-xl-12 ">
    <div class="footer-copy-right text-center">
    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Aditya Educational Society tekkali.</a></p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div><?PHP include 'footer.php';?>
    