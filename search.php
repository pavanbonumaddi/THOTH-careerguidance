<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<main>
<section class="about-area2 section-padding">
<div class="container">
<div class="section-tittle mb-40">
<div class="row">

<?php
echo "<center><h4>Search Results for: <b>".$search_query."</b></center>";

// Perform search across all relevant columns using UNION ALL
$sql = "(SELECT name, description, url FROM certifications WHERE name LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%' OR description LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%')
        UNION ALL
        (SELECT name, description, url FROM higher_ed WHERE name LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%' OR description LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%')
        UNION ALL
        (SELECT name, banner, url FROM internship WHERE name LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%' OR banner LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%')
        UNION ALL
        (SELECT name, description, url FROM jobs WHERE name LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%' OR description LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%')
        UNION ALL
        (SELECT name, banner, url FROM roadmaps WHERE name LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%' OR banner LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%')
        UNION ALL
        (SELECT name, banner AS description, url FROM skilled_courses WHERE name LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%' OR banner LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%')";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Print the search results as needed
        echo '<div class="col-12">';
        echo '<div class="about-img about-img1">';
        echo '<a target="_blank" href="' . (filter_var($row['url'], FILTER_VALIDATE_URL) ? $row['url'] : '#') . '"><h2>' . $row['name'] . '</h2></a>';
        echo '<p class="mb-20">' . $row['description'] . '</p>';
        if (filter_var($row['url'], FILTER_VALIDATE_URL)) {
            echo '<a href="' . $row['url'] . '"><h6>' . $row['url'] . '</h6></a>';
        }
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results found";
}
$conn->close();
?>






</div>
</section>
</main><?PHP include 'footer.php';?>