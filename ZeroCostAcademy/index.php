<?php
session_start();  // Start the session

$showModal = false;
if (!isset($_SESSION["username"])) {
    $showModal = true;
} else {
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
}
?>


<!-- Your HTML content here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
    </meta>

    <title>ZeroCost Academy : Online Courses</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
     <link href="pop_style.css" rel="stylesheet"> 

    <link href="img/icon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="userProfile.js"></script>
</head>

<body>




<?php if (!$showModal): ?>
   
<?php else: ?>
    <!-- Button to trigger modal (optional, can be hidden and triggered by JS) -->
    <button id="openModalBtn" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#signupModal">
        Open Signup
    </button>
<?php endif; ?>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="signup.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">Signup</h5>
        
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
       <div class="modal-footer d-flex flex-column align-items-center w-100">
       <button type="submit" class="btn w-100" style="background-color: #ff6600; color: white;">Signup</button>


  <p class="mt-3 mb-0 text-center">
    Already have an account? 
    <a href="login.html" style="color: #0d6efd; text-decoration: none;">Log In</a>
  </p>
</div>

      </form>
    </div>
  </div>
</div>

<!-- Auto trigger modal on page load if user not logged in -->
<?php if ($showModal): ?>
    <script>
  window.onload = function() {
    const modal = new bootstrap.Modal(document.getElementById('signupModal'), {
      backdrop: 'static',  // Prevent closing by outside click
      keyboard: false      // Prevent closing with Esc key
    });
    modal.show();
  };
 
  window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('signup') === 'true') {
      const signupModal = new bootstrap.Modal(document.getElementById('signupModal'));
      signupModal.show();
    }
  });


</script>
<?php endif; ?>

  
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

<!-- Navbar Start -->
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <p class="m-0 fw-bold" style="font-size: 25px;"><img src="img/logo_website.png" alt="" height="200px" width="200px"></p>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            style="border: none;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="courses.php" class="nav-item nav-link">Courses</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="team.php" class="dropdown-item">Our Team</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            <a href="#" class="nav-item nav-link">
                <div id="google_translate_element"></div>
            </a>
        </div>
    </div>
            <!-- 👤 Profile Icon Dropdown -->
            <div class="nav-item dropdown profile-dropdown">
    <a href="#" class="nav-link" onclick="toggleProfileDropdown(event)">
        <i class="fas fa-user-circle fa-lg"></i>
    </a>
    <div class="profile-card shadow" id="profileDropdown">
        <div class="profile-img">
        <span class="profile-initials">
    <?php
        if (isset($_SESSION["username"])) {
            $nameParts = explode(" ", trim($_SESSION["username"]));
            $initials = "";

            if (count($nameParts) >= 2) {
                // First and last name only
                $initials .= strtoupper($nameParts[0][0]); // First name initial
                $initials .= strtoupper(end($nameParts)[0]); // Last name initial
            } else {
                // Single name (mononym)
                $initials .= strtoupper($nameParts[0][0]);
            }

            echo htmlspecialchars($initials);
        } else {
            echo "GU"; // Guest User
        }
    ?>
</span>

        </div>
        <h5 class="profile-name">
            <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : "Guest"; ?>
        </h5>
        <p class="profile-email">
            <?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : "Not logged in"; ?>
        </p>
        <div class="profile-actions">
            <?php if (isset($_SESSION["username"])): ?>
                <button class="btn-logout" onclick="logout()">Logout</button>
            <?php else: ?>
                <a href="login.html" class="btn-login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>


            <!-- End Profile Dropdown -->

        </div>
    </div>
</nav>
<!-- Navbar End -->

<script>

</script>


<style>


</style>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-4">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/image_carosol.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                            <h5 class="text-uppercase mb-3 animated slideInDown" style="color:rgb(252, 252, 252);">Best E-learning Platform</h5>
<h1 class="display-3 text-white animated slideInDown">Master In-Demand Skills with Free Courses & Certificates</h1>

<p class="text-white mb-4 pb-2">Discover a variety of online courses to help you build job-ready skills. Learn anytime, anywhere, and at your own pace.</p>

<p class="text-white mb-4 pb-2">Gain access to video lessons, downloadable notes, and certification exams—all for free. Start your journey toward a brighter future with ZeroCost Academy today.</p>


                                   <a class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="signup.html" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/image_carosol-2.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                            <h5 class="text-uppercase mb-3 animated slideInDown" style="color: rgb(252, 252, 252);">Welcome to ZeroCost Academy</h5>
<h1 class="display-3 text-white animated slideInDown">Learn. Practice. Get Certified.</h1>
<p class="text-white mb-4 pb-2">ZeroCost Academy offers easy-to-follow video lessons, downloadable PDF notes, and quizzes to test your knowledge. Whether you're a beginner or looking to upgrade your skills, our courses are designed to help you learn at your own pace.</p>

                                <a href="about.php"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="signup.html" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-2 text-center">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 style="color: #5E32B5;">Invest in your professional goals with ZeroCost Academy</h1>
                    <p class="mb-5">Get unlimited access to over 90% of courses, Projects, Specializations, and
                        Professional Certificates on Coursera, taught by top instructors.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                        <div class="service-item text-center pt-3 shadow">
                            <div class="p-4">
                                <img src="img/icon1.png" alt="" width="60px" class="mb-4">
                                <h5 class="mb-3">Learn anything</h5>
                                <p style="color: #333333;">Explore any interest or trending topic, take prerequisites, and advance your skills</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3 shadow">
                        <div class="p-4">
                            <img src="img/icon2.png" alt="" width="60px" class="mb-4">
                            <h5 class="mb-3">Save money</h5>
                            <p style="color: #333333;">Spend less money on your learning if you plan to take multiple courses this year</p>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    
                    <div class="service-item text-center pt-3 shadow">
                        <div class="p-4">
                            <img src="img/icon3.png" alt="" width="60px" class="mb-4">
                            <h5 class="mb-3">Flexible learning</h5>
                            <p style="color: #333333">Learn at your own pace, move between multiple courses, or switch to a different course
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
                
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3 shadow">
                        <div class="p-4">
                            <img src="img/icon4.png" alt="" width="60px" class="mb-4">
                            <h5 class="mb-3">Unlimited certificates</h5>
                            <p>Earn a certificate for every learning program that you complete at no additional cost</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start pe-3">About Us</h6>
                    <h1 class="mb-4" style="color: #5E32B5;">Welcome to ZeroCost Academy</h1>
                    <p class="mb-4">At ZeroCost Academy, we believe in accessible, innovative learning experiences that
                        adapt to your schedule and learning style. Join us in embracing the future of education and
                        unlock your potential with our immersive online courses.</p>
                    <p class="mb-4"> Welcom to ZeroCost Academy, your gateway to boundless learning opportunities. We're
                        dedicated to democratizing education, offering a diverse range of courses taught by industry
                        experts. Our mission is to empower learners worldwide, fostering a community-driven platform
                        where knowledge knows no limits.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right  me-2"></i>Expert Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right me-2"></i>Live Interactive Sessions</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right me-2"></i>Comprehensive Course Catalog</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right me-2"></i>Community Engagement</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right me-2"></i>Personalized Learning Paths</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right me-2"></i>Certification and Recognition</p>
                        </div>
                    </div>
                    <a class="btn text-light py-3 px-5 mt-2" style="background-color: #5E32B5"href="about.php">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->




    <!-- Banner-1 Start -->
    <div class="container-xxl py-5 pt-5 bg-light">
        <div class="container">
            <div class="row g-5 ">
                <div class="col-lg-6 p-5 wow fadeInUp" data-wow-delay="0.3s">

                    <h1 class="mb-4" style="color: #5E32B5;">Explore Free Courses</h1>
                    <p class="mb-4">Start your online learning journey at Great Learning Academy for free with our
                        short-term basic courses across various in-demand domains.</p>

                    <a class="btn text-light py-3 px-5 mt-2" href="courses.php" style="color:rgb(255, 255, 255) ;  background-color: #5E32B5; ">Start For Free</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/banner-1.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner-1 End -->




    <!-- Courses End -->
  


    <!-- Banner-2 Start -->
    <section class="pb-5" style="background: url('img/banner-3.jpeg');">
        <div class="container-xxl mt-5" >
            <div class="container" >
                <div class="row g-5 ">
    
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100 bg-light" src="img/Udemy.jpg" alt=""
                                style="object-fit: cover;">
                        </div>
                    </div>
    
                    <div class="col-lg-6 p-5 wow fadeInUp" data-wow-delay="0.3s">
    
                        <h1 class="mb-4" style="color: #5E32B5;">Become an Instructor</h1>
                        <p class="mb-4 text-white">Instructors from around the world teach millions of learners on Udemy. We provide
                            the tools and skills to teach what you love.</p>
    
                        <a class="btn text-light py-3 mt-2" href="instructor.html">Start Teaching Today</a>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    <!-- Banner-2 End -->

    <!-- FAQ Start  -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Frequently Asked Questions</h1>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is the ZeroCost Academy ?
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The ZeroCost Academy is an initiative taken by ZeroCost Academy, where we offer 1000+ free online courses in cutting-edge technologies and have successfully enrolled a whopping 5 Million+ learners across all domains. ZeroCost Academy covers courses on Data Science, Machine Learning, Artificial Intelligence, Cloud Computing, Software Development, Sales and Business Development, Digital Marketing, Big Data, and many more.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Why should I choose ZeroCost Academy Academy for free courses with certificates ?
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            ZeroCost Academy Academy is an excellent choice for free courses with certificates because of the high quality of the learning content. The courses are well-crafted, offer a great learning experience, and are interactive and engaging, making them ideal for learners in identifying what works best for their career goals.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Is the website completely free?
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            Yes! ZeroCost Academy is 100% free to use, with no hidden fees, subscriptions, or advertisements.


                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              Do I need to enroll in each course separately?
                              </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                No, ZeroCost Academy does not require course enrollment. Once you're logged in, you can access any available course instantly without filling out additional forms or enrolling.
                                </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                What are the most popular free courses offered by ZeroCost Academy ?
                              </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                ZeroCost Academy focuses on in-demand concepts and skills, where learners can develop industry-relevant knowledge in their chosen sector. It provides a wide range of courses in prestigious fields, assisting learners across the globe in achieving their professional goals.

                                <p>Some of the most popular free courses offered by ZeroCost Academy that are in high demand today include:</p>
                                <ul>
                                    <li>Free Data Science Courses</li>
                                    <li>Free Artificial Intelligence Courses</li>
                                    <li>Free Software Courses</li>
                                    <li>Free Cloud Computing Courses</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End  -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <p><a class="text-light" href="about.php">About Us</a></p>
                    <p><a class="text-light" href="contact.php">Contact Us</a></p>
                    <p><a class="text-light" href="Privacy_Policy.html">Privacy Policy</a></p>
                    <p><a class="text-light" href="terms_and_conditions.html">Terms & Condition</a></p>
                    <p><a class="text-light" href="FAQs_and_help.html">FAQs & Help</a></p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>402107 Raigad, Lonere, Maharashtra</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 7057461009</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>secretcoder@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/secret.coder_07" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/secret_coder" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://wa.me/7057461009" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/secret.coder.07" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="tel:+917057461009">
                            <i class="fas fa-phone-alt"></i>
                        </a>


                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Subscribe to our Newsletter</h4>
                    <p>Subscribe now and join our growing community of learners committed to lifelong education! </p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form action="#">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email"
                                placeholder="Your email" required>
                            <button type="submit"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"><a
                                    href="mailto:lahaneshriram2@gmail.com">Subscribe</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="team.php">ZeroCost Academy</a>, All Right Reserved.

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    


    <!-- <script>
function toggleDropdown() {
  const container = document.getElementById('profileContainer');
  container.classList.toggle('active');
}

// Close dropdown when clicking outside
window.addEventListener('click', function(e) {
  const container = document.getElementById('profileContainer');
  const dropdown = document.getElementById('profileDropdown');
  
  if (!container.contains(e.target)) {
    container.classList.remove('active');
  }
});

function logout() {
  window.location.href = 'logout.php';
}
</script> -->



    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>