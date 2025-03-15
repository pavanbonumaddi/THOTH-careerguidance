<?PHP include 'header.php';?>
<?php
include('conn.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define database connection parameters

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
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
    if(isset($_POST['skilled_Courses_name'])){
        $name = $_POST['skilled_Courses_name'];
        $url = $_POST['skilled_Courses_url'];
        $description = $_POST['skilled_Courses_description'];
        $skno = $_POST['skilled_course_sno'];
        // Upload image
        $sql = "INSERT INTO skilled_Courses (name, banner, url, sctype, screlation) VALUES ('$name', '$description', '$url', '2', '$skno')";

            // Execute SQL statement
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("New record created successfully.")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo '<script>alert("Data Upload Failed")</script>';
        }
    }

?>
	<!-- Left Sidebar End -->
	<!-- Body Start -->
	<div class="wrapper">
		<div class="sa4d25">
			<div class="container-fluid">			
				
				
                <div class="container">
                    <h2>sub Skilled Courses </h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">    

						<label for="eventName">Skilled Courses Name:</label>
						<input type="text" id="skilled_Courses_name" name="skilled_Courses_name" required>
				
						<label for="eventBanner">Skilled Courses Description:</label>
						<input type="text" id="skilled_Courses_description" name="skilled_Courses_description" required>
				
						<label for="eventName">Skilled Courses URL:</label>
						<input type="text" id="skilled_Courses_url" name="skilled_Courses_url" required>

						<label for="eventName">Select Skilled Courses:</label>
						<select id="skilled_course" name="skilled_course_sno">
							<?php
								$sql1 = "SELECT * FROM skilled_courses WHERE sctype = '1'";
								$result1 = mysqli_query($conn, $sql1); // Assuming $conn is your database connection

								if ($result1) {
									if (mysqli_num_rows($result1) > 0) {
										echo '<option>Select Options...</option>';
										while ($row1 = mysqli_fetch_assoc($result1)) {
											echo '<option value="' . $row1['sno'] . '">' . $row1['name'] . '</option>';
										}
									} else {
										echo '<option>No Data Found</option>';
									}
								} else {
								// Handle query error
								// echo "Error: " . mysqli_error($conn);
								}
							?>
					
						</select>    

						<button type="submit">Submit</button>
					</form>
				
                </div>
                
			</div>
		</div><?PHP include 'footer.php';?>
