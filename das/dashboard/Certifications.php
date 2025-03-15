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

    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $maxIndex = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $maxIndex)];
        }
        return $randomString;
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

        $name = $_POST['certifications_name'];
        $url = "";
        if(isset($_POST['certifications_url'])) {
            $url = $_POST['certifications_url'];
        }
        $description = $_POST['certifications_description'];
        $provider = $_POST['certifications_provider'];
        $fileuploaded = 0;

        // Upload image
            if($url == ""){
                $randomgen1 = generateRandomString(15);
                $target_dir = "..//assets/docs/uploads/"; // Directory where the file will be saved
                $target_pdf = $target_dir . $randomgen1 . '_' . basename($_FILES["certifications_file"]["name"]);
                $pdfile = $randomgen1 . '_' . basename($_FILES["certifications_file"]["name"]);
                $fileuploaded = 1;
                $imageFileType = strtolower(pathinfo($target_pdf, PATHINFO_EXTENSION));
                
                if(move_uploaded_file($_FILES["certifications_file"]["tmp_name"], $target_pdf)){

                    $sql = "INSERT INTO `certifications` (name, description, provider, url,  file_tye) VALUES ('$name', '$description', '$provider', '$pdfile',  '$fileuploaded')";
                    // Execute SQL statement
                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("New record created successfully.")</script>';
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }else {
                    echo '<script>alert("Failed to upload image.")</script>';
                }
            }else{
                $sql = "INSERT INTO certifications (name, description,  provider, url, file_tye) VALUES ('$name', '$description', '$url', '$provider',  '$fileupload')";
                    // Execute SQL statement
                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("New record created successfully.")</script>';
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
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
					<h2>Certifications </h2>
    				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
						<label for="eventName">Certifications Name:</label>
						<input type="text" id="certifications_name" name="certifications_name" required>
				
						<label for="eventDescription">Certifications Description:</label>
						<input type="certifications_description" name="certifications_description" rows="4" required>
				
						<label for="eventProvider">Certifications Link:</label>
						<input type="text" id="certifications_provider" name="certifications_provider" required>
				
						<label for="link">Certifications Provider:</label>
						<input type="text" id="certifications_Url" name="certifications_url" required>
				
						<label for="certificationsBanner">Upload certifications PDF File:</label>
						<input type="file" id="certifications_file" name="certifications_file" accept=".pdf"><br>
				
				
						<button type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>	<?PHP include 'footer.php';?>
