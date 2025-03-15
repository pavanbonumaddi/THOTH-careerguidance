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

    if (!validateImageSize($_FILES['Internship_banner'])) {
        echo '<script>alert("Image size must be less than 1MB.")</script>';
    } else {
        // Collect form data
        $name = $_POST['Internship_name'];
        $url = $_POST['Internship_url'];
        $banner = $_FILES['Internship_banner']['name'];
        $targetDir = "..//..//assets/img/uploads/";
        $targetFile = $targetDir . basename($_FILES['Internship_banner']['name']);

        // Upload image
        if (move_uploaded_file($_FILES['Internship_banner']['tmp_name'], $targetFile)) {
            // Prepare SQL statement to insert data into table
            $sql = "INSERT INTO internship (name, banner, url, in_type, in_relation) VALUES ('$name', '$banner', '$url', '1', '1')";

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
                    <h2>Internship's </h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
    				    <label for="eventName">Internship Name:</label>
                        <input type="text" id="Internship_name" name="Internship_name" required>
                
                        <label for="eventBanner">Internship URL:</label>
                        <input type="text" id="Internship_url" name="Internship_url" required>
                
                        <label for="eventBanner">Internship Banner Image:</label>
                        <input type="file" id="Internship_banner" name="Internship_banner" accept="image/*" required>
                
                
                        <button type="submit">Submit</button>
                    </form>
                </div>
                
                
			</div>
		</div><?PHP include 'footer.php';?>