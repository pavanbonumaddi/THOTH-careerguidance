<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<main>
<section class="about-area2 section-padding">
<div class="container">
<div class="section-tittle text-center mb-40">
<h2>Higher Education</h2>
</div>

<div class="row align-items-center ">

<?php
// Define database connection parameters
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to fetch data
$sql = "SELECT * FROM `higher_ed` WHERE `mbctype` = '1'";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        // Echo HTML format with data from database
        echo '<div class="offset-xxl-4 col-xxl-4 col-xl-4 col-lg-5 col-md-6">';
             echo '<div class="about-caption about-caption1">';
                echo '<div class="about-img about-img1  ">';
                    echo '<a href="higher_education_courses.php?he='.$row['mbca'].'"><img src="assets/img/gallery/'.$row['banner'].'" alt></a>';
                echo'</div>';
                echo '<div class="founder-text"><br>';
                echo '</div>';
            echo '</div>';
        echo '</div>';

        echo '<div class="col-xxl-7 col-xl-7 col-lg-9 col-md-12">';
            echo '<div class="about-caption about-caption1">';
                echo '<a href="higher_education_courses.php?he='.$row['mbca'].'"><h2>'.$row['name'].'</h2></a>';
                echo '<p class="mb-20">'.$row['description'].'</p>';
                echo '<div class="founder-text"><br>';
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
    