<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<section class="about-area2 section-padding">
<div class="container">
<div class="section-tittle text-center mb-40">
<h2>product Based</h2>
</div>
<div class="row align-items-center ">

<?php
// Prepare SQL query to fetch data
$sql1 = "SELECT * FROM `jobs` WHERE `pg` = '2' AND `ps` = '1'";
$result1 = $conn->query($sql1);

// Check if there are any rows returned
if ($result1->num_rows > 0) {
    // Loop through each row
    while ($row1 = $result1->fetch_assoc()) {
        // Echo HTML format with data from database
        if($row1['file_typ'] == 0){
        echo '<div class="offset-xxl-4 col-xxl-4 col-xl-4 col-lg-5 col-md-6">';
        echo '<div class="about-caption about-caption1">';
        echo '<div class="about-img about-img1  ">';
        echo '<a tatget="blank" href="'.$row1['url'].'"><img src="assets/img/uploads/'.$row1['banner'].'" alt></a>';
        echo '</div>';
        echo '<div class="founder-text"><br>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-xxl-7 col-xl-7 col-lg-9 col-md-12">';
        echo '<div class="about-caption about-caption1">';
        echo '<a target="blank" href="'.$row1['url'].'"><h2>'.$row1['name'].'</h2></a>';
        echo '<p class="mb-20">'.$row1['description'].'</p>';
                echo '<div class="founder-text"><br>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
        }else{
            echo '<div class="offset-xxl-4 col-xxl-4 col-xl-4 col-lg-5 col-md-6">';
        echo '<div class="about-caption about-caption1">';
        echo '<div class="about-img about-img1  ">';
        echo '<a href="pdfviewer.php?index=jobs&data='.$row1['sno'].'"><img src="assets/img/uploads/'.$row1['banner'].'" alt></a>';
        echo '</div>';
        echo '<div class="founder-text"><br>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-xxl-7 col-xl-7 col-lg-9 col-md-12">';
        echo '<div class="about-caption about-caption1">';
        echo '<a href="pdfviewer.php?index=jobs&data='.$row1['sno'].'"><h2>'.$row1['name'].'</h2></a>';
        echo '<p class="mb-20">'.$row1['description'].'</p>';
                echo '<div class="founder-text"><br>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
        }

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
    