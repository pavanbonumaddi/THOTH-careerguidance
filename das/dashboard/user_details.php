<?PHP include 'header.php';?>
<?php
    include 'conn.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $roll = $_POST['roll_no'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $pswrd = $_POST['password'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $phnno = $_POST['phone_no'];

        echo "Inserting";
        
        $sql = "INSERT INTO `user_details` (`name`, `roll`, `branch`, `email`, `pswrd`, `dob`, `gender`, `phno`, `typ`) VALUES ('$name', '$roll', '$branch', '$email', '$pswrd', '$dob', '$gender', '$phnno', '2')";
        
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
      echo "<script>alert('Enter All the Required Details');</script>";
    }
}
?>
<style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2; /* Light gray background for the body */
            }
            table {
                border-collapse: collapse;
                width: 100%;
                background-color: #ffffff; /* White background for the table */
            }
            table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            vertical-align: middle; /* This is what centers content vertically */
        }
            th {
                background-color: #f2f2f2; /* Light gray background for table headers */
            }
            tr:nth-child(even) {
                background-color: #f9f9f9; /* Light gray background for even rows */
            }
            tr:nth-child(odd) {
                background-color: #ffffff; /* White background for odd rows */
            }
            .edit-icon {
                width: 20px;
                height: 20px;
                background-image: url('edit_icon.png'); /* Replace 'edit_icon.png' with the actual path to your edit icon */
                background-size: cover;
                cursor: pointer;
            }
            .modal {
                display: none;
                position: fixed;
                z-index: 9999; /* Increased z-index */
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0,0,0);
                background-color: rgba(0,0,0,0.4);
                padding-top: 60px;
				}

				.modal-content {
					background-color: #fefefe;
					margin: 5% auto;
					padding: 20px;
					border: 1px solid #888;
					width: 80%;
				}

				.close {
					color: #aaa;
					float: right;
					font-size: 28px;
					font-weight: bold;
				}

				.close:hover,
				.close:focus {
					color: black;
					text-decoration: none;
					cursor: pointer;
				}
				a {
					text-decoration: none; /* Remove underline */
					color: inherit; /* Inherit color from parent */
					cursor: pointer; /* Optional: Change cursor on hover */
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
            background-color: #3419ae;
            color: red;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }
            button:hover {
                background-color: blue;
            }
        </style>
	<!-- Left Sidebar End -->
	<!-- Body Start -->
	<div class="wrapper">
		<div class="sa4d25">
			<div class="container-fluid">			
				
				<div class="container">
                    <h2>Admin details</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="role">ID</label>
                    <input type="text" id="role" name="roll_no" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" oninput="validateEmail();" required>
                    <div id="warning" class="warning" style="display:none;">Use @adityatekkali.edu.in</div>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone_no" required>
                    <input type="submit" value="Register">
                    </form>
                </div>
                
                
			</div>
		</div><?PHP include 'footer.php';?>