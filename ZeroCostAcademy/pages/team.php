<?php

session_start();  // Start the session

// Check if the user is logged in by checking the session variables
if (!isset($_SESSION["username"])) {
    // Redirect to signup page if the user is not logged in
    header("Location: index.php");
    exit;
}

$username = $_SESSION["username"];
$email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ZeroCost Academy : Team</title>
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
    <script src="userProfile.js"></script>
    <link href="pop_style.css" rel="stylesheet"> 


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


   <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <p class="m-0 fw-bold" style="font-size: 25px;"><img src="img/logo_website.png" alt="" height="200px" width="200px"></p>    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            style="border: none;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="courses.php" class="nav-item nav-link">Courses</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
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



    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Our Team</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Team Start -->
<!--    Shriram lahane Prophile start-->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden text-center pt-5">
                            <img class="img-fluid" src="img/Shriram.jpg.webp" alt="" style="height: 400px; width: 300px;">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                                    href="https://www.linkedin.com/in/shriram_01/"><i
                                        class="fab fa-linkedin"></i></a>

                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                                    href="mailto:lahaneshriram2@gmil.com"><i class="fa fa-envelope"></i></a>
                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                                    href="https://github.com/shriram7057"><i class="fab fa-github"></i></a>
                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1" href="tel:+917057461009">
                                    <i class="fas fa-phone-alt"></i>
                                </a>

                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Shriram Lahane</h5>
                            <small>Team Leader</small>
                        </div>
                    </div>
                </div>
                <!--Shriram lahane Prophile end-->

                <!-- bhagyesh bhalerao Prophile start-->
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden text-center pt-5">
                            <img class="img-fluid" src="img/Bhagyesh.jpg" alt="" style="height: 400px; width: 300px;">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                                    href="https://www.linkedin.com/in//"><i
                                        class="fab fa-linkedin"></i></a>

                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                                    href="mailto:bhagyeshbhalerao31@gmail.com"><i class="fa fa-envelope"></i></a>
                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                                    href="https://github.com/bhagyesh-31"><i class="fab fa-github"></i></a>
                                <a target="_blank" class="btn btn-sm-square btn-primary mx-1" href="tel:+918446316968">
                                    <i class="fas fa-phone-alt"></i>
                                </a>

                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Bhagyesh Bhalerao</h5>
                            <small>Team Member</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--     Bhagyesh Bhalerao Prophile end-->

<!--    Shrutik Kangne Prophile start-->
    <div class="row">
        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item bg-light">
                <div class="overflow-hidden text-center pt-5">
                    <img class="img-fluid" src="img/shrutik.jpg" alt="" style="height: 400px; width: 300px;">
                </div>
                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                           href="https://www.linkedin.com/in//"><i
                                class="fab fa-linkedin"></i></a>
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                           href="mailto:shrutik.kangane2021@gmail.com"><i class="fa fa-envelope"></i></a>
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                           href="https://github.com/shrutik2022"><i class="fab fa-github"></i></a>
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1" href="tel:+917769024684">
                            <i class="fas fa-phone-alt"></i>
                        </a>

                    </div>
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0">Shrutik Kangane</h5>
                    <small>Team Member</small>
                </div>
            </div>
        </div>
        <!--Shrutik Kangne Prophile end-->

        <!--    Dnyaneshwar Kamblekar Prophile start  -->
        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item bg-light">
                <div class="overflow-hidden text-center pt-5">
                    <img class="img-fluid" src="img/dnyaneshwar.jpg" alt="" style="height: 400px; width: 300px;">
                </div>
                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                           href="https://www.linkedin.com/in//"><i
                                class="fab fa-linkedin"></i></a>
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                           href="mailto:dkamblekar11@gmail.com"><i class="fa fa-envelope"></i></a>
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1"
                           href="https://github.com/dnyaneshwar02"><i class="fab fa-github"></i></a>
                        <a target="_blank" class="btn btn-sm-square btn-primary mx-1" href="tel:+917    057461009">
                            <i class="fas fa-phone-alt"></i>
                        </a>

                    </div>
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0">Dnyaneshwar Kamblekar</h5>
                    <small>Team Member</small>
                </div>
            </div>
        </div>
    </div>
    <!--    Dnyaneshwar Kamblekar Prophile end-->
    <!-- Team End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <p><a class="text-light" href="about.php">About Us</a></p>
                    <p><a class="text-light" href="contact.php">Contact Us</a></p>
                    <p><a class="text-light" href="">Privacy Policy</a></p>
                    <p><a class="text-light" href="">Terms & Condition</a></p>
                    <p><a class="text-light" href="">FAQs & Help</a></p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>402107 Rayiad, Lonere</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 7057461009</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>secretcoder@gmail.com</p>
                    <div class="d-flex pt-2">

                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/secret.coder_07" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/secret_coder" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://wa.me/7057461009" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/secret.coder.07" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
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
                        &copy; <a class="border-bottom" href="index.php">ZeroCost Academy</a>, All Right Reserved.

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>