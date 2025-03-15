<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<main>
<section class="about-area2 section-padding">
<div class="container">
<div class="section-tittle text-center mb-40">
<?php
// Define database connection parameters
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$he = $_GET['intern'];
// Prepare SQL query to fetch data
$sql = "SELECT * FROM `internship` WHERE `in_type` = '1' AND `in_relation` = $he";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        echo "<h2>".$row['name']."</h2>";           
    }
} else {
    echo "No data found.";
}
?>
</div>
<div class="row align-items-center ">

<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Duration</th>
    <th>Link</th>
  </tr>

<?php
// Prepare SQL query to fetch data
$sql1 = "SELECT * FROM `internship` WHERE `in_type` = '2' AND `in_relation` = $he";
$result1 = $conn->query($sql1);

// Check if there are any rows returned
if ($result1->num_rows > 0) {
    // Loop through each row
    while ($row1 = $result1->fetch_assoc()) {
        // Echo HTML format with data from database<div class="col-xxl-7 col-xl-7 col-lg-9 col-md-24">
            echo '<tr>';
            echo '<th>'.$row1['name'].'</th>';
            echo '<th>'.$row1['banner'].'</th>';
            echo '<td><a target ="blank" href="'.$row1['url'].'"style="color: blue;">'.$row1['url'].'</a></th>';
            echo '</tr>';
    }
} else {echo '<tr>';
    echo '<th>No data Found</th>';
    echo '<th>No data Found</th>';
    echo '<th>No data Found</th>';
    echo '</tr>';}

// Close database connection
$conn->close();
?>
  
  </table><br><br>
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
    <h4>Roadmaps</h4>
    <ul>
    <li><a href="Roadmaps.php">Frontend</a></li>
    <li><a href="Roadmaps.php">Backend</a></li>
    <li><a href="Roadmaps.php">AI and Data scientist</a></li>
    <li><a href="Roadmaps.php">Game developer</a></li>
    <li><a href="Roadmaps.php">AWS</a></li>
    <li><a href="Roadmaps.php">Devops</a></li>
    <li><a href="Roadmaps.php">SQL</a></li>
    <li><a href="Roadmaps.php">software Architect</a></li>
    </ul>
    </div>
    </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
    <div class="single-footer-caption mb-50">
    <div class="footer-tittle">
    <h4>Services</h4>
    <ul>
    <li><a href="Skilled_courses.php">Skilled Courses</a></li>
    <li><a href="Government_jobs.php">Government Jobs</a></li>
    <li><a href="jobs.php">Jobs</a></li>
    <li><a href="higher_education.php">Higher Education</a></li>
    <li><a href="certifications.php">certifications</a></li>
    <li><a href="internships.php">Internships</a></li>
    <li><a href="Roadmaps.php">Roadmaps</a></li>
    </ul>
    </div>
    </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
    <div class="single-footer-caption mb-50">
    <div class="footer-tittle">
    <h4>Jobs</h4>
    <ul>
    <li><a href="product_base.php">product_based</a></li>
    <li><a href="service_based.php">Servicebased</a></li>
    </ul>
    </div>
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
    