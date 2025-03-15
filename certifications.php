<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<main>
<section class="about-area2 section-padding">
<div class="container">
<div class="section-tittle text-center mb-40">
<h2>Certifications</h2>
</div>
      <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }    
      </style>
<table style="width:100%">
  <tr>
    <th>Technology</th>
    <th>Provider</th>
    <th>Description</th>
    <th>Link</th>
  </tr>
  <?php
    // Define database connection parameters
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `certifications`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Loop through each row
      while ($row = $result->fetch_assoc()) {
        if($row['file_tye'] == 0){
          echo '<tr>';
          echo '<th>No data Found</th>';
          echo '<th>No data Found</th>';
          echo '<th>No data Found</th>';
          echo '</tr>';
        }else{
          echo '<tr>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['provider'].'</td>';
        echo '<td>'.$row['description'].'</td>';
        echo '<td><a target ="blank" href="'.$row['url'].'"style="color: blue;">'.$row['url'].'</a></th>';
        // echo '<td> <a href="pdfviewer.php?index=certifications&url='.$row['sno'].'" style="color: blue;"> link here </a>  </td>';
        echo '</tr>';}
        }
      
    } else {
      echo "No data found.";
    }

    // Close database connection
    $conn->close();
  ?>  
  
</table>
</div>
</section>

<?PHP include 'footer.php';?>