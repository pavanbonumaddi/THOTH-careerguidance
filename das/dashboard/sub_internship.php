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
    if(isset($_POST['Internship_name'])){
        $name = $_POST['Internship_name'];
        $url = $_POST['Internship_url'];
        $description = $_POST['Internship_duration'];
        $skno = $_POST['Internship'];
        // Upload image
        $sql = "INSERT INTO internship (name, banner, url, in_type, in_relation) VALUES ('$name', '$description', '$url', '2', '$skno')";

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
					<h2>sub Internships</h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
					<select id="Internship" name="Internship">
						<?php
							$sql1 = "SELECT * FROM internship WHERE in_type = '1'";
							$result1 = mysqli_query($conn, $sql1); // Assuming $conn is your database connection

							if ($result1) {
								if (mysqli_num_rows($result1) > 0) {
									echo '<option>Select Options...</option>';
									while ($row1 = mysqli_fetch_assoc($result1)) {
										echo '<option style="margin : 10 px;" value="' . $row1['sno'] . '">' . $row1['name'] . '</option>';
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

						<label for="eventName">Internship Name:</label>
                        <input type="text" id="Internship_name" name="Internship_name" required>

                        <label for="eventBanner">Internship Duration:</label>
                        <input type="text" id="Internship_duration" name="Internship_duration" required>

                        <label for="eventName">Internship URL:</label>
                        <input type="text" id="Internship_url" name="Internship_url" required>

                        <button type="submit">Submit</button>
                    </form>
				</div>
			</div>
		</div><?PHP include 'footer.php';?>