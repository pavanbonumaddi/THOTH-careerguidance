
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

    if (!validateImageSize($_FILES['jobBanner'])) {
        echo '<script>alert("Image size must be less than 1MB.")</script>';
    } else {
        // Collect form data
        $name = $_POST['jobName'];
        $url = isset($_POST['jobUrl']) ? $_POST['jobUrl'] : "";
		$description = $_POST['jobDescription'];
        $pg = $_POST['jobType'];
        $ps = $_POST['jobCategory'];
        
        $randomgen = generateRandomString(15);
        $banner = $randomgen . $_FILES['jobBanner']['name'];
        $targetDir = "..//..//assets/img/uploads/";
        $targetbanner = $targetDir. $randomgen  . basename($_FILES['jobBanner']['name']);

        // Upload image
        if (move_uploaded_file($_FILES['jobBanner']['tmp_name'], $targetbanner)) {
            // Prepare SQL statement to insert data into table
            if(empty($url)){
                $randomgen1 = generateRandomString(15);
                $target_dir = "..//..//assets/docs/uploads/"; // Directory where the file will be saved
                $target_pdf = $target_dir . $randomgen1 . '_' . basename($_FILES["jobfile"]["name"]);
                $pdfile = $randomgen1 . '_' . basename($_FILES["jobfile"]["name"]);

                if(move_uploaded_file($_FILES["jobfile"]["tmp_name"], $target_pdf)){
                    $fileuploaded = 1;
                } else {
                    echo '<script>alert("Failed to upload PDF file.")</script>';
                    exit; // Exit if failed to upload PDF file
                }
            } else {
                $pdfile = $url;
                $fileuploaded = 0;
            }

            $sql = "INSERT INTO `jobs` (`name`, `description`, `banner`, `url`, `pg`, `ps`, `file_typ`) 
                    VALUES ('$name', '$description', '$banner', '$pdfile', '$pg', '$ps', '$fileuploaded')";

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


<?PHP include'header.php';?>
	<!-- Body Start -->
	<div class="wrapper">
		<div class="sa4d25">
			<div class="container-fluid">			
				
		<div class="container">
			<h2>Jobs </h2>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
            	<label for="jobName">Job Name:</label>
				<input type="text" id="jobName" name="jobName"><br>
				<label for="jobDescription">Job Description:</label>
				<textarea id="jobDescription" name="jobDescription" rows="4"></textarea><br>
				<label for="jobUrl">Job Url:</label>
				<input type="text" id="jobUrl" placeholder="" name="jobUrl"><br>
				<label for="jobBanner">Job Banner Image:</label>
				<input type="file" id="jobBanner" name="jobBanner" accept="image/*"><br>
				
				<label for="jobBanner">Upload Job PDF File:</label>
				<input type="file" id="jobfile" name="jobfile" accept=".pdf"><br>
				
				<select id="jobType" name="jobType">
				<option value="">Select Type</option>
				<option value="2">Private</option>
				<option value="1">Government</option>
			</select><br><br>
			<label for="jobCategory">Job Category:</label><br>
			<select id="jobCategory" name="jobCategory">
				<option value="">Select Category</option>
				<option value="1">Product</option>
				<option value="2">Service</option>
			</select><br><br>
				<span id="errorText" class="error" style="display: none;"></span>
				<button type="submit">Submit</button>
			</form>
			</div>	
					</div>
				</div>


				
				<script>
        function validateForm() {
            var name = document.getElementById("jobName").value;
            var description = document.getElementById("jobDescription").value;
            var banner = document.getElementById("jobBanner").value;
            var pdfile = document.getElementById("jobfile").value;
            var type = document.getElementById("jobType").value;
            var category = document.getElementById("jobCategory").value;
            var errorText = document.getElementById("errorText");

            if (name == "" || description == "" || banner == "" || type == "" || category == "") {
                errorText.innerHTML = "All fields are required.";
                errorText.style.display = "block";
                return false;
            }

            var fileSize = document.getElementById("jobBanner").files[0].size;
            if (fileSize > 1000000) { // 1 MB in bytes
                errorText.innerHTML = "Image size must be less than 1MB.";
                errorText.style.display = "block";
                return false;
            }

            errorText.style.display = "none";
            return true;
        }
    </script>
<?PHP include'footer.php' ?>

	<script>
    const fileUploadBtn = document.getElementById('jobfile');
    const urlInput = document.getElementById('jobUrl');
    fileUploadBtn.addEventListener('click', function() {
        urlInput.disabled = true;
    });
        urlInput.addEventListener('input', function() {
        fileUploadBtn.disabled = !!this.value;
    });
</script>
	
</body>

<!-- Mirrored from gambolthemes.net/html-items/cursus_main_demo/live_streams.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 10:38:09 GMT -->
</html>