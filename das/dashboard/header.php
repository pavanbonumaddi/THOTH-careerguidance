<?php
include 'conn.php';
  session_start();
  if(empty($_SESSION['user'])){
    header("Location: ../../login.php");
  }else{
    $sno = $_SESSION['user'];
  }
?>
<?PHP
if($sno){
	$sql = "SELECT * FROM `user_details` WHERE `sno` = '$sno'  LIMIT 1";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        
        while ($row = mysqli_fetch_assoc($result)) {
          $admin = $row['typ'];
		  if($admin != 1){
			header("Location: ../../index.php");	
		  }
		}
	}else{
		header("Location: ../../index.php");
	}
}else{
	header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title>THOTH</title>
		
		<link rel="icon" type="image/png" href="assets/img/logo/logoo.png">
		
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/vertical-responsive-menu.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">	
		
		<style>
			body {
				font-family: Arial, sans-serif;
				background-color: #e11e1e;
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
	
			.container {
				max-width: 600px;
				margin: 50px auto;
				padding: 20px;
				border-radius: 8px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}
	
			label {
				display: block;
				margin-bottom: 8px;
			}
	
			input, select, textarea {
				width: 100%;
				padding: 8px;
				margin-bottom: 16px;
				box-sizing: border-box;
			}
	
			button {
				background-color: #b11038;
				color: #fff;
				padding: 10px 15px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}
	
			button:hover {
				background-color: #b11038;
			}
		</style>
	</head>

<body>
	<header class="header clearfix">
		<button type="button" id="toggleMenu" class="toggle_menu">
		  <i class='uil uil-bars'></i>
		</button>
		<button id="collapse_menu" class="collapse_menu">
			<i class="uil uil-bars collapse_menu--icon "></i>
			<span class="collapse_menu--label"></span>
		</button>
		
		<div class="header_right">
			<ul>
				<li>
					<a href="Skilled Courses.php" class="upload_btn" title="Create New Course">Create New Course</a>
				</li>
				
				<li class="ui dropdown">
					<a href="#" class="opts_account" title="Account">
						<img src="images/hd_dp.jpg" alt="">
					</a>
					<div class="menu dropdown_account">
						
						<div class="night_mode_switch__btn">
							<a href="#" id="night-mode" class="btn-night-mode">
								<i class="uil uil-moon"></i> Night mode
								<span class="btn-night-mode-switch">
									<span class="uk-switch-button"></span>
								</span>
							</a>
						</div>
						<a href="logout.php" class="item channel_item">Sign Out</a>
					</div>
				</li>
			</ul>
		</div>
	</header>
	<!-- Header End -->
	<!-- Left Sidebar Start -->
	<nav class="vertical_nav">
		<div class="left_section menu_left" id="js-menu" >
			<div class="left_section">
				<ul>
					<li class="menu--item">
						<a href="index.php" class="menu--link active" title="Home">
							<i class='uil uil-home-alt menu--icon'></i>
							<span class="menu--label">Home</span>
						</a>
					</li>
					<li class="menu--item menu--item__has_sub_menu">
						<label class="menu--link" title="Categories">
							<i class='uil uil-kayak menu--icon'></i>
							<span class="menu--label">Government Jobs</span>
						</label>
						<ul class="sub_menu">
							<li class="sub_menu--item">
								<a href="Government _Jobs.php" class="sub_menu--link">Government Jobs</a>
							</li>
							<li class="sub_menu--item">
								<a href="Update_Government _Jobs.php" class="sub_menu--link">Update_Government Jobs</a>
							</li>
						</ul>
					</li>
					<li class="menu--item menu--item__has_sub_menu">
						<label class="menu--link" title="Categories">
							<i class='uil uil-search menu--icon'></i>
							<span class="menu--label">Certifications</span>
						</label>
						<ul class="sub_menu">
							<li class="sub_menu--item">
								<a href="certifications.php" class="sub_menu--link">Certifications</a>
							</li>
							<li class="sub_menu--item">
								<a href="update_certifications.php" class="sub_menu--link">Update_Certifications</a>
							</li>
						</ul>
					</li>
					<li class="menu--item menu--item__has_sub_menu">
						<label class="menu--link" title="Categories">
							<i class='uil uil-layers menu--icon'></i>
							<span class="menu--label">Higher Education</span>
						</label>
						<ul class="sub_menu">
							<li class="sub_menu--item">
								<a href="Higher Education.php" class="sub_menu--link">Higher Education</a>
							</li>
							<li class="sub_menu--item">
								<a href="sub_higher_education.php" class="sub_menu--link">Sub Higher Education</a>
							</li>
							<li class="sub_menu--item">
								<a href="update_higher_education.php" class="sub_menu--link">Update_Higher Education</a>
							</li>
						</ul>
					</li>
					<li class="menu--item  menu--item__has_sub_menu">
						<label class="menu--link" title="Tests">
						  <i class='uil uil-clipboard-alt menu--icon'></i>
						  <span class="menu--label">Skilled Courses</span>
						</label>
						<ul class="sub_menu">
							<li class="sub_menu--item">
								<a href="Skilled Courses.php" class="sub_menu--link">Skilled Courses</a>
							</li>
							<li class="sub_menu--item">
								<a href="sub_skilled_course.php" class="sub_menu--link">sub Skilled Courses</a>
							</li>
							<li class="sub_menu--item">
								<a href="update_skilled_courses.php" class="sub_menu--link">Update Skilled Courses</a>
							</li>
						</ul>
					</li>
					<li class="menu--item menu--item__has_sub_menu">
						<label class="menu--link" title="Categories">
							<i class='uil uil-heart-alt menu--icon'></i>
							<span class="menu--label">Roadmaps</span>
						</label>
						<ul class="sub_menu">
							<li class="sub_menu--item">
								<a href="Roadmaps.php" class="sub_menu--link">Roadmaps</a>
							</li>
							<li class="sub_menu--item">
								<a href="update_Roadmaps.php" class="sub_menu--link">Update_Roadmaps</a>
							</li>
						</ul>
					</li>
					<li class="menu--item  menu--item__has_sub_menu">
						<label class="menu--link" title="Tests">
						  <i class='uil uil-clipboard-alt menu--icon'></i>
						  <span class="menu--label">Internship</span>
						</label>
						<ul class="sub_menu">
							<li class="sub_menu--item">
								<a href="Internships.php" class="sub_menu--link">Internship</a>
							</li>
							<li class="sub_menu--item">
								<a href="sub_internship.php" class="sub_menu--link">sub Internship</a>
							</li>
							<li class="sub_menu--item">
								<a href="Update_Internship.php" class="sub_menu--link">Update_Internship</a>
							</li>
						</ul>
					</li>
					<li class="menu--item  menu--item__has_sub_menu">
						<label class="menu--link" title="Tests">
						  <i class='uil uil-chart-line menu--icon'></i>
						  <span class="menu--label">Users</span>
						</label>
						<ul class="sub_menu">
							<li class="sub_menu--item">
								<a href="admin_details.php" class="sub_menu--link">Admin Details</a>
							</li>
							<li class="sub_menu--item">
								<a href="Update_users.php" class="sub_menu--link">Add New user</a>
							</li>
						</ul>
					</li>
					
					
					</li>
				</ul>
			</div>
			
		</div>
	</nav>