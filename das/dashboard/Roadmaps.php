<?PHP include 'header.php';?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define database connection parameters
    include('conn.php');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to validate image size
    function validateImageSize($file) {
        if ($file['size'] > 1000000) { // 1 MB in bytes
            return false;
        }
        return true;
    }

    // Function to validate required fields
    function validateRequiredFields($fields) {
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                return false;
            }
        }
        return true;
    }

    if (!validateImageSize($_FILES['roadmaps_banner'])) {
        echo '<script>alert("Image size must be less than 1MB.")</script>';
    } else {
        // Collect form data
        $name = $_POST['roadmaps_name'];
        $url = $_POST['roadmaps_url'];
        $banner = $_FILES['roadmaps_banner']['name'];
        $targetDir = "..//..//assets/img/uploads/";
        $targetFile = $targetDir . basename($_FILES['roadmaps_banner']['name']);

        // Upload image
        if (move_uploaded_file($_FILES['roadmaps_banner']['tmp_name'], $targetFile)) {
            // Prepare SQL statement to insert data into table
            $sql = "INSERT INTO roadmaps (name, banner, url) VALUES ('$name', '$banner', '$url')";

            // Execute SQL statement
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("New record created successfully.")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo '<script>alert("Failed to upload image.")</script>';
        }
    }

    // Close database connection
    $conn->close();
}
?>
	<!-- Left Sidebar End -->
	<!-- Body Start -->
	<div class="wrapper">
		<div class="sa4d25">
			<div class="container-fluid">			
				
				
                <div class="container">
					<h2>Roadmaps</h2>
					<form method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
						<label for="eventName">Roadmaps Name:</label>
						<input type="text" id="roadmaps_name" name="roadmaps_name" required>
				
						<label for="eventBanner">Roadmaps Banner URL:</label>
						<input type="text" id="roadmaps_url" name="roadmaps_url" required>
				
						<label for="eventBanner">Roadmaps Banner Image:</label>
						<input type="file" id="roadmaps_banner" name="roadmaps_banner" accept="image/*" required>
				
				
						<button type="submit">Submit</button>
					</form>
				</div>
				
			</div>
		</div><?PHP include 'footer.php';?>