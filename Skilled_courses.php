<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<section class="popular-directorya-area section-padding fix">
<div class="container">
<div class="row">
<div class="col-lg-12">

<div class="section-tittle text-center mb-40">
<h2>Skilled Courses</h2>
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

$sql = "SELECT * FROM `skilled_courses` WHERE `sctype` = 1";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row 
    while ($row = $result->fetch_assoc()) {
      echo'<div class="col-xl-4 col-lg-4 col-md-8 col-sm-8">';
      echo'<div class="properties pb-30">';
      echo'<div class="properties-card">';
      echo'<div class="properties-img overlay1">';
      echo'<a href="sc_courses.php?skc='.$row['sno'].'"><img src="assets/img/uploads/'.$row['banner'].'" alt></a>';
      echo'</div>';
      echo'<div class="properties-caption">';
      echo'<h3><a href="sc_courses.php?skc='.$row['sno'].'">'.$row['name'].'</a></h3>';
      echo'</div>';
      echo'</div>';
      echo'</div>';
      echo'</div>';
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
</main><?PHP include 'footer.php';?>