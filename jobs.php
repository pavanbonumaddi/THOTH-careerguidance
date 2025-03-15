<?PHP include 'header.php'; 
if(empty($_SESSION['user'])){
    header("location: login.php");
}
?>
<section class="about-area2 section-padding">
<div class="container">
<div class="section-tittle text-center mb-40">
<h2>Providing Jobs</h2>
</div>
<div class="row align-items-center ">

<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
<div class="about-img about-img1  ">
  <a href="product_base.php"><img src="assets/img/gallery/product_based.png" alt></a>
</div>
<div class="founder-text"><br>
  <a href="product_base.php"><h3>product Based</h3></a>
</div>
</div>

<div class="offset-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-md-12">
<div class="about-caption about-caption1">
    <div class="about-img about-img1  ">
      <a href="service_based.php"><img src="assets/img/gallery/ServicebasedCO-1.jpg" alt></a>
</div>
<div class="founder-text"><br>
  <a href="service_based.php"><h3>Service Based</h3></a>
</div>
</div>
</div>



</div>
</section>
</main><?PHP include 'footer.php';?>
    