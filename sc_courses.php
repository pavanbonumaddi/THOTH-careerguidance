<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<section class="about-area2 section-padding">
<div class="container">
<div class="section-tittle text-center mb-40">
<?php
// Define database connection parameters
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$he = $_GET['skc'];
// Prepare SQL query to fetch data
$sql = "SELECT * FROM `skilled_courses` WHERE `sctype` = '1' AND `screlation` = $he";
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


<?php
// Prepare SQL query to fetch data
$sql1 = "SELECT * FROM `skilled_courses` WHERE `sctype` = '2' AND `screlation` = '$he'";
$result1 = $conn->query($sql1);

// Check if there are any rows returned
if ($result1->num_rows > 0) {
    // Loop through each row
    while ($row1 = $result1->fetch_assoc()) {
        // Echo HTML format with data from database<div class="col-xxl-7 col-xl-7 col-lg-9 col-md-24">
        echo    '<div class="col-12">';
        echo    '<div class="about-img about-img1  ">';
        echo    '<a target="_blank" href="'.$row1['url'].'"><h2>'.$row1['name'].'</h2></a>';
        echo    '<p class="mb-20">'.$row1['banner'].'</p></div>';
        echo    '<a href="'.$row1['url'].'"><h6>'.$row1['url'].'</h6></a>';
        echo    '<div class="founder-text"><br>';
        echo    '</div>';
        echo    '</div>';
    }
} else {
    echo "No data found.";
}

// Close database connection
$conn->close();
?>


</div>
</section>
</main><?PHP include 'footer.php';?>
    