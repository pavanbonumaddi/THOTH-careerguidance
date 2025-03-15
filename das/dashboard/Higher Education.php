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

    if (!validateImageSize($_FILES['higher_education_banner'])) {
        echo '<script>alert("Image size must be less than 1MB.")</script>';
    } else {
        // Collect form data
        $name = $_POST['higher_education_name'];
        $url = $_POST['higher_education_url'];
        $htype = $_POST['higher_education_Type'];
        $description = $_POST['higher_education_description'];
        $banner = $_FILES['higher_education_banner']['name'];
        $targetDir = "..//..//assets/img/uploads/";
        $targetFile = $targetDir . basename($_FILES['higher_education_banner']['name']);

        // Upload image
        if (move_uploaded_file($_FILES['higher_education_banner']['tmp_name'], $targetFile)) {
            // Prepare SQL statement to insert data into table
            $sql = "INSERT INTO higher_ed (name, description, banner, mbca, mbctype, url) VALUES ('$name', '$description', '$banner','$htype', '1', '$url')";
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
					<h2>Higher Education</h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
    
						<label for="eventName">Higher Education Name:</label>
						<input type="text" id="higher_education_name" name="higher_education_name" required>
				
						<label for="eventDescription">Higher Education Description:</label>
						<input type="eventDescription" id="higher_education_description" name="higher_education_description" rows="4" required>
				
						<label for="eventBanner">Higher Education Banner URL:</label>
						<input type="text" id="higher_education_url" name="higher_education_url" required>
				
						<label for="eventBanner">Higher Education Image:</label>
						<input type="file" id="higher_education_banner" name="higher_education_banner" accept="image/*" required>
				
						<select id="higher_education_Type" name="higher_education_Type">
						<option value="">Select Type</option>
						<option value="2">M.Tech</option>
						<option value="1">MBA</option>
						</select>
				
				
						<button type="submit">Submit</button>
					</form>
				</div>
				
			</div>
		</div><?PHP include 'footer.php';?>