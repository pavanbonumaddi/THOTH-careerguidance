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
$he = $_GET['data'];
$ind= $_GET['index'];
// Prepare SQL query to fetch data
$sql = "SELECT * FROM $ind WHERE  `sno` = $he";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        echo '<iframe src="http://localhost/thoth-new/assets/docs/uploads/' . $row['url'] . '" width="100%" height="1000px"></iframe>';
    }
} else {
    echo "No data found.";
}
?>
</div>
<div class="row align-items-center ">

</div>
</section>
</main><?PHP include 'footer.php';?>