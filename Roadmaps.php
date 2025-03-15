<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
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

$sql = "SELECT * FROM `roadmaps`";
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
</div>


</section>
</main><?PHP include 'footer.php';?>