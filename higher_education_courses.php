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
<?php
// Define database connection parameters
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$he = $_GET['he'];
// Prepare SQL query to fetch data
$sql = "SELECT * FROM `higher_ed` WHERE `mbctype` = '1' AND `mbca` = $he";
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
</div>
</div>
<div class="row">

<?php
// Prepare SQL query to fetch data
$sql1 = "SELECT * FROM `higher_ed` WHERE `mbctype` = '2' AND `mbca` = '$he'";
$result1 = $conn->query($sql1);

// Check if there are any rows returned
if ($result1->num_rows > 0) {
    // Loop through each row
    while ($row1 = $result1->fetch_assoc()) {
        // Echo HTML format with data from database
        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
        echo '    <div class="single-location mb-20">';
        echo '        <div class="location-img">';
        echo '            <img src="assets/img/uploads/'.$row1['banner'].'" alt>';
        echo '        </div>';
        echo '        <div class="location-details">';
        echo '            <h4><a target="blank" href="'.$row1['url'].'">'.$row1['name'].'';
        echo '            </a></h4>';
        echo '            <a target="blank" href="'.$row1['url'].'" class="location-btn">Course</a>';
        echo '        </div>';
        echo '    </div>';
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
</main><?PHP include 'footer.php';?>