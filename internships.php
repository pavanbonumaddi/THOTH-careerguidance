<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<main>
<section class="popular-directorya-area section-padding fix">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-tittle text-center mb-40">
<h2>Internships</h2>
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
$sql = "SELECT * FROM `internship` WHERE `in_type` = 1;";
$result = $conn->query($sql);
// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row 
    while ($row = $result->fetch_assoc()) {
      
      echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
      echo '<div class="properties pb-30">';
      echo '<div class="properties-card">';
      echo '<div class="properties-img overlay1">';
      echo '<a href="internships_data.php?intern='.$row['sno'].'"><img src="assets/img/uploads/'.$row['banner'].'" alt></a>';
      echo '<div class="img-text">';
      echo '</div>';
      echo '</div>';
      echo '<div class="properties-caption">';
      echo '<h3>';
      echo '<a href="internships_data.php?intern='.$row['sno'].'">'.$row['name'].'</a>';
      echo '</h3>';
      echo '<div class="ratting">';
      echo '</div>';
      echo '</div>';
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
<?PHP include 'footer.php';?>