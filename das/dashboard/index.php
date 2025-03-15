<?php
// Assuming you have already connected to your database
include 'conn.php';
// Array to store the data
$dataFromDatabase = array();

// Function to fetch row count from a table
function getRowCount($tableName, $conn) {
    $query = "SELECT COUNT(*) as count FROM $tableName";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

// Replace 'your_table_1', 'your_table_2', ..., 'your_table_7' with your actual table names
$tables = array('certifications', 'higher_ed', 'internship', 'jobs', 'roadmaps', 'skilled_courses', 'user_details');

// Loop through each table to fetch row counts
foreach ($tables as $table) {
    // Fetch row count
    $count = getRowCount($table, $conn);
    
    // Add data to the array
    $dataFromDatabase[] = array('category' => $table, 'count' => $count);
}

// Define the colors
$colors = array(
    'FFBCB5', // lightest color
    'FF9083',
    'F25C4F',
    'D63B2B',
    'BB2518',
    '83140C',
    '580700'  // darkest color
);

// Function to get the color based on count
function getColor($count, $maxCount, $colors) {
    $index = floor(($count / $maxCount) * (count($colors) - 1));
    return $colors[$index];
}

// Get the maximum count
$maxCount = max(array_column($dataFromDatabase, 'count'));
?>

<?php include 'header.php';?>
	<!-- Left Sidebar End -->
	<!-- Body Start -->

	<style>
		.graph_section {
			margin-top: 20px;
			background-color: aliceblue;
		}

			.graph_section {
		margin-top: 20px;
		background-color: aliceblue;
	}

	.graph {
		display: flex;
		flex-direction: row;
		align-items: flex-end;
	}

	.bar {
		width: 90px;
		margin-right: 20px;
		margin-left: 20px;
		transition: height 0.5s ease-in-out;
	}

	.graph_section h2 {
		margin-bottom: 10px;
	}

		
	</style>


	<div class="wrapper">
		<div class="sa4d25">
			<div class="container-fluid">			
				<div class="row">
					<div class="col-xl-9 col-lg-8">
						<div class="section3126">
							<div class="row">
								<div class="col-xl-6 col-lg-12 col-md-6">
									<div class="value_props">
										<div class="value_icon">
											<i class='uil uil-user-check'></i>
										</div>
										<div class="value_content">
											<?php 
											$sql = "SELECT * FROM `user_details`";
											$result = mysqli_query($conn, $sql);
											$students = mysqli_num_rows($result);
											echo "<h4>".$students."</h4>";
											?>
											<p>Student's Registered</p>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-12 col-md-6">
									<div class="value_props">
										<div class="value_icon">
										<i class='uil uil-history'></i>
										</div>
										<div class="value_content">
											<?php 
											$sql = "SELECT * FROM `certifications`";
											$result = mysqli_query($conn, $sql);
											$students = mysqli_num_rows($result);
											echo "<h4>".$students."</h4>";
											?>
											<p>Certification's Available</p>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-12 col-md-6">
									<div class="value_props">
										<div class="value_icon">
											<i class='uil uil-play-circle'></i>
										</div>
										<div class="value_content">
											<?php 
											$sql = "SELECT * FROM `internship`";
											$result = mysqli_query($conn, $sql);
											$students = mysqli_num_rows($result);
											echo "<h4>".$students."</h4>";
											?>
											<p>Internship's Detailed</p>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-12 col-md-6">
									<div class="value_props">
										<div class="value_icon">
											<i class='uil uil-presentation-play'></i>
										</div>
										<div class="value_content">
											<?php 
											$sql = "SELECT * FROM `jobs`";
											$result = mysqli_query($conn, $sql);
											$students = mysqli_num_rows($result);
											echo "<h4>".$students."</h4>";
											?>
											<p>Job's Listed</p>
										</div>
									</div>
								</div>
								
							</div>
							<!-- Graph Representation Section -->
							<div class="graph_section">
								<h2>Student Engagement by Category</h2>
								<div class="graph" id="graph">
								<div class="graph" id="graph">
        <?php
        // Output bars dynamically using PHP
        foreach ($dataFromDatabase as $item) {
            // Calculate the height of the bar based on the count
            $height = $item['count'] * 5; // Adjust multiplier as needed
            
            // Get the color based on the count
            $color = getColor($item['count'], $maxCount, $colors);
            
            // Output the bar with the calculated height and color
            echo '<div class="bar" style="height: ' . $height . 'px; background-color: #' . $color . ';" data-category="' . $item['category'] . '" data-count="' . $item['count'] . '"></div>';
        }
        ?>
    </div>

								</div>
								<h4 style="word-spacing: 52px;">Certifications Education Internships Govt.PVT.Jobs RoadMaps SkilledCourses Users</h4>
							</div>
							
						</div>	
					</div>
					<div class="col-xl-3 col-lg-4">
						<div class="right_side">
							<div class="fcrse_3">
							</div>
							<div class="get1452">
								<h4>Try The New dark Mode Feauters!</h4>
								<p>Light Theme and dark Theme are here</p>
								<p>Click on user Icon to Switch for the feature</p>
							</div>
							<div class="fcrse_3">
								<div class="cater_ttle">
									<h4>Top Categories</h4>
								</div>
								<ul class="allcate15">
									<li><a href="../../internships.php" target="_blank" class="ct_item"><i class='uil uil-arrow'></i>Internships</a></li>
									<li><a href="../../certifications.php" target="_blank" class="ct_item"><i class='uil uil-graph-bar'></i>Certifications</a></li>
									<li><a href="../../Roadmaps.php" target="_blank" class="ct_item"><i class='uil uil-monitor'></i>Roadmaps</a></li>
									<li><a href="../../Skilled_courses.php" target="_blank" class="ct_item"><i class='uil uil-ruler'></i>Skilled Courses</a></li>
									<li><a href="../../higher_education.php" target="_blank" class="ct_item"><i class='uil uil-chart-line'></i>Higher Education</a></li>
									<li><a href="../../Government_jobs.php" target="_blank" class="ct_item"><i class='uil uil-book-open'></i>Government Jobs</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?PHP include 'footer.php';?>