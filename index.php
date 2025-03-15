<?PHP include 'header.php'; ?>
<main>
<div class="slider-area slider-height">
<div class="slider-active">
<div class="single-slider">
<div class="slider-cap-wrapper">
<div class="hero-caption">
<h1 data-animation="fadeInUp" data-delay=".2s">Welcome To AITAM</h1>
<p data-animation="fadeInUp" data-delay=".6s">THOTH<br> Career Guidance</p>
<form action="search.php" id="search-box" method="get" class="search-box">
<div class="input-form">
<input type="text" name="Q" placeholder="search your path..">
</form>
<a class="search-form" href="#" onclick="document.getElementById('search-box').submit(); return false;" ><i class="ti-search"></i></a>
</div>
</div>
<div class="hero-img position-relative">
<img src="assets/img/hero/h1_hero1.jpg" alt data-animation="fadeInRight" data-transition-duration="5s">
</div>
</div>
</div>
</div>
</div>
<section class="popular-directorya-area section-padding fix">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-tittle text-center mb-40">
<h2>Services</h2>
</div>
</div>
</div>
<div class="directory-active">
<div class="properties pb-20">
<div class="properties-card">
<div class="properties-img overlay1">
<a href="Skilled_courses.php"><img src="assets/img/gallery/courses1.jpg" alt></a>
<div class="img-text">
</div>
</div>
<div class="properties-caption">
<h3>
<a href="Skilled_courses.php">Skilled Courses</a>
</h3>
<div class="ratting">
</div>
</div>
</div>
</div>
<div class="properties pb-20">
<div class="properties-card">
<div class="properties-img overlay1">
<a href="Government_jobs.php"><img src="assets/img/gallery/courses2.jpg" alt></a>
<div class="img-text">
</div>
</div>
<div class="properties-caption">
<h3>
<a href="Government_jobs.php">Government Jobs</a>
</h3>
<div class="ratting">
</div>
</div>
</div>
</div>
<div class="properties pb-20">
<div class="properties-card">
<div class="properties-img overlay1">
<a href="higher_education.php"><img src="assets/img/gallery/courses3.jpg" alt></a>
<div class="img-text">
</div>
</div>
<div class="properties-caption">
<h3>
<a href="higher_education.php">Higher Education</a>
</h3>
<div class="ratting">
</div>
</div>
</div>
</div>
<div class="properties pb-20">
<div class="properties-card">
<div class="properties-img overlay1">
<a href="certifications.php"><img src="assets/img/gallery/courses4.jpg" alt></a>
<div class="img-text">
</div>
</div>
<div class="properties-caption">
<h3>
<a href="certifications.php">Certifications</a>
</h3>
<div class="ratting">
<ul>
</div>
</div>
</div>
</div>
<div class="properties pb-20">
<div class="properties-card">
<div class="properties-img overlay1">
<a href="internships.php"><img src="assets/img/gallery/courses5.jpg" alt></a>
<div class="img-text">
</div>
</div>
<div class="properties-caption">
<h3>
<a href="internships.php">Internships</a>
</h3>
<div class="ratting">
</div>
</div>
</div>
</div>
<div class="properties pb-20">
<div class="properties-card">
<div class="properties-img overlay1">
<a href="Roadmaps.php"><img src="assets/img/gallery/courses6.jpg" alt></a>
<div class="img-text">
</div>
</div>
<div class="properties-caption">
<h3>
<a href="Roadmaps.php">Roadmaps</a>
</h3>
<div class="ratting">
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="about-area1 about-area2 fix">
<div class="container">
<div class="row align-items-center section-overlay">
<div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12">
<div class="about-img about-img1">
<img src="assets/img/gallery/about1.jpg" alt>
</div>
</div>
<div class="offset-xxl-1 col-xxl-5 col-xl-7 col-lg-6 col-md-12">
<div class="about-caption about-caption1">
<div class="section-tittle mb-25">
<h2> Government Sector Opportunities</h2>
<p class="mb-20"> we showcase job listings notified by various companies in both government providing comprehensive opportunities for prospective candidates.</div>
<div class="slider-btns">
<a data-animation="fadeInLeft" data-delay="1.0s" href="Government_jobs.php" class="btn hero-btn">Browse </a>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="about-area2 section-padding">
    <div class="container">
    <div class="section-tittle text-center mb-40">
    </div>
    <div class="row align-items-center ">
    
    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-8">
    <div class="about-img about-img1  ">
    <a href="internships.php"><img src="assets/img/gallery/new_ship.jpeg" alt></a>
    </div>
    <div class="founder-text"><br>
    </div>
    </div>
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10">
    <a href="internships.php"><h2>Internships</h2></a>
    <div class="about-img about-img1  ">
        <p class="mb-20">Internships provide hands-on experience in a specific field, offering students or recent graduates the opportunity to apply theoretical knowledge in a real-world setting. They serve as a bridge between academic learning and professional work, helping individuals develop practical skills, build a professional network, and explore career paths.</p>
    </div>
    <div class="founder-text"><br>
    </div>
    </div>
    </div>
    </section>
<section class="popular-location section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-tittle text-center mb-40">
<h2>Explore top Roadmaps</h2>
</div>
</div>
</div>
<div class="row">
<?php
// Define database connection parameters
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `roadmaps` LIMIT 8";
$result = $conn->query($sql);
// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
        echo '<div class="single-location mb-20">';
        echo '<div class="location-img">';
        echo '<img src="assets/img/uploads/'.$row['banner'].'" alt>';
        echo '</div>';
        echo '<div class="location-details">';
        echo '<h4><a href="'.$row['url'].'">'.$row['name'].'</a></h4>';
        echo '<a href="'.$row['url'].'" class="location-btn">View Roadmaps</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No data found.";
}
// Close database connection
$conn->close();
?>
</div>
</div>
</section>
<section class="about-area2 section-bg">
<div class="container">
<div class="row align-items-center">
<div class="offset-xxl-1 col-xxl-4 col-xl-5 col-lg-6 col-md-12">
<div class="about-caption about-caption2">
<div class="section-tittle mb-25">
<h2>Certifications</h2>
<p class="mb-20"> Explore a curated collection of certification courses provided by prominent companies, equipping you with valuable skills and enhancing your professional development. </p>
</div>
<div class="single-features">
<div class="features-icon">
<img src="assets/img/icon/tick.svg" alt>
</div>
<div class="features-caption">
<p>Stay ahead in your career with these industry-recognized certifications.</p>
</div>
</div>
<div class="single-features">
<div class="features-icon">
</div>
<div class="features-caption">
</div>
</div>
<div class="single-features mb-40">
<div class="features-icon">
</div>
<div class="features-caption">
</p>
</div>
</div>
<div class="slider-btns">
<a data-animation="fadeInLeft" data-delay="1.0s" href="certifications.php" class="btn hero-btn mr-15">Certification Courses</a>
<a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn" href="https://www.youtube.com/watch?v=Wxdj970RM7M">
</a>
</div>
</div>
</div>
<div class="offset-xl-1  col-xxl-5 col-xl-5 col-lg-6 col-md-12">
<div class="about-img about-img2  ">
<img src="assets/img/gallery/about2.jpg" alt>
</div>
</div>
</div>
</div>
</section>
</main>
<?PHP include 'footer.php';?>