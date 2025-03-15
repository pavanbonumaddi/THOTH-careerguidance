<?PHP
    include 'conn.php'; 
?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    if ($_POST['text1']){
        // Collect form data
        $data = $_POST['text1'];
        $sno = $_POST['sno'];
        $field = $_POST['data'];;
            // Prepare SQL statement to insert data into table
            $sql = "UPDATE `certifications` SET ".$field." = '".$data."' WHERE `sno` = ".$sno."";

            // Execute SQL statement
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Updated successfully.")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            echo '<script>alert("Not updated.")</script>';
        }
    }
}
?>
<?php
// Check if form is submitted
if (isset($_GET['delete'])) {
    // Retrieve SNO from query parameter
    $sno = $_GET['delete'];
    // Your PHP code to handle SNO
    $sql1 = "DELETE FROM `certifications` WHERE `sno` = ".$sno."";
    // Execute SQL statement
    if ($conn->query($sql1) === TRUE) {
        if(!isset($_POST['text1'])){
            echo '<script>alert("Deleted successfully.")</script>';
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    echo '<script>alert("Failed to Delete.")</script>';
}
 
}
include 'header.php'
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

<script>
        function validateForm() {
            var certdata = document.getElementById("text1").value;
            if (certdata == "") {
                alert("Please Enter Data to Cintue...");
                return false;
            }

            return true;
        }
    </script>

	<!-- Body Start -->
	<div class="wrapper">
		<div class="sa4d25">
			<div class="container-fluid">			
				
		<div class="container">
				<h2>Certifications List</h2>

				<table>
					<thead>
							<th>Name</th>
							<th>Description</th>
							<th>Provider</th>
							<th>URL</th>
							<th>Delete</th>
					</thead>
					<tbody>
                    <?php
                    $sql1 = "SELECT * FROM certifications ";
                    $result1 = mysqli_query($conn, $sql1); // Assuming $conn is your database connection
                    if ($result1) {
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                echo  "<tr>
                                <td><a href='#myModal?sno=".$row1['sno']."&text1=".$row1['name']."&data=name' class='no-hash' onclick='openModal(this.hash)'>".$row1['name']."</a></td>
                                <td><a href='#myModal?sno=".$row1['sno']."&text1=".$row1['description']."&data=description' class='no-hash' onclick='openModal(this.hash)'>".$row1['description']."</a></td>
                                <td><a href='#myModal?sno=".$row1['sno']."&text1=".$row1['provider']."&data=provider' class='no-hash' onclick='openModal(this.hash)'>".$row1['provider']."</a></td>
                                <td><a href='#myModal?sno=".$row1['sno']."&text1=".$row1['url']."&data=url' class='no-hash' onclick='openModal(this.hash)'>".$row1['url']."</a></td>
                                <td><center><a href='?delete=".$row1['sno']."' class='upload_btn' title='Delete row'>Delete</a></center></td>
                                </tr>";
                            }
                        } else {
                            echo 'No Data Found';
                        }
                    } else {
                    // Handle query error
                    // echo "Error: " . mysqli_error($conn);
                    }  
                        ?>
						
					</tbody>
                    <form id="myForm" method="post">
                        <!-- Your PHP code to execute on anchor click -->
                        <input type="hidden" name="submit" value="1">
                    </form>
				</table>
				
				<!-- The Modal -->
				<div id="myModal" class="modal">
				<!-- Modal content -->
				<div class="modal-content">
					<span class="close" onclick="closeModal()">&times;</span>
					<form id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<input type="hidden" name="sno" id="snoInput">
					<input type="hidden" name="data" id="dataInput">
					<label for="text1">Text:</label>
					<input type="text" name="text1" id="text1Input">
					<button type="submit">Submit</button>
					</form>
				</div>
				</div>
				<script>
				// Function to open modal and parse URL data
				function openModal(hash) {
					var modal = document.getElementById("myModal");
					var urlData = hash.substring(hash.indexOf('?') + 1).split('&');
					for (var i = 0; i < urlData.length; i++) {
					var keyValue = urlData[i].split('=');
					if (keyValue[0] === 'sno') {
						document.getElementById("snoInput").value = keyValue[1];
					} else if (keyValue[0] === 'text1') {
						document.getElementById("text1Input").value = decodeURIComponent(keyValue[1]);
					} else if (keyValue[0] === 'data') {
						document.getElementById("dataInput").value = keyValue[1];
					}
					}
					modal.style.display = "block";
				}

				// Function to close modal
				function closeModal() {
					var modal = document.getElementById("myModal");
					modal.style.display = "none";
				}
				</script>

		</div>
			</div>
				<?PHP include 'footer.php';?>