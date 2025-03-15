<?PHP 
  include 'header.php'; 
  if(empty($_SESSION['user'])){
      header("location: login.php");
  }
?>
<main>
<section class="about-area2 section-padding">
<div class="container">
<div class="row align-items-center ">
<div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12">
<div class="about-img about-img1  ">
<img src="assets/img/gallery/career_guidance.jpg" alt>
</div>
</div>
<div class="offset-xxl-1 col-xxl-5 col-xl-7 col-lg-6 col-md-12">
<div class="about-caption about-caption1">
<div class="section-tittle mb-25">
<h2> career Guidance</h2>
<p class="mb-20">Discover Your Path to Success with Skilled Courses, Higher Education, Internships, and Government Jobs
Skilled CoursesEmbark on a journey of skill enhancement with our comprehensive range of courses designed to meet industry demands. Whether you're a beginner or looking to advance your career, our tutorials and videos will guide you every step of the way.
<h3>Tutorials and Videos:</h3>
Our expertly curated content includes tutorials and videos to make your learning experience engaging and effective.
Our platform offers valuable insights into various educational paths, including degree programs, certifications, and more.
<h3>Roadmaps:</h3>
Planning your educational journey is made easy with our detailed roadmaps. From choosing the right program to securing financial aid, we provide a step-by-step guide to help you achieve your academic goals.
Internships
<h3>Job Preparation Resources:</h3>
Access preparation materials, practice tests, and expert advice to excel in government job exams. We're here to support you on your path to a rewarding career in public service.
</p>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<?PHP include 'footer.php';?>