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
        <a href="ChatBot.html" class="nav-item nav-link">ChatBot</a>
            <a href="index.php" class="nav-item nav-link">Home</a>

            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="courses.php" class="nav-item nav-link active">Courses</a>
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


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">Categories</h6>
                <h1 class="mb-5" style="color: #fb873f;">Popular Topics to Explore</h1>
                <h3 class="mb-4" style="color: #fb873f;">PDF Notes Yoc Can Easily Download</h3>
<!--                <h3 class="mb-4" style="color: #fb873f;">Yoc Can Easily Download</h3>-->
            </div>
            <div class="row g-2 m-2">
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat1.png" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/MicrosoftExcelNotes.pdf" class="text-center">Microsoft Excel</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat2.png" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/AWSNotes.pdf" class="text-center"> AWS</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat3.png" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/PythonNotes.pdf" class="text-center">Python</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat4.png" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/Java Notes.pdf" class="text-center">Java</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat5.jpeg" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/WebDesigningNotes.pdf" class="text-center">Web Design</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat6.png" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/WebDevelopementNotes.pdf" class="text-center">Web Development</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat7.png" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/MySQLNotes.pdf" class="text-center">MySQL</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat-8.jpg" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/SoftwareDevelopmentNotes.pdf" class="text-center">Software Development</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat-9.jpg" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/COMPUTERNETWORKSNOTES.pdf" class="text-center">Computer Networks</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat-10.jpg" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/EthicalHackingNotes.pdf" class="text-center">Ethical Hacking</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat-11.jpg" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/CyberSecurityNotes.pdf" class="text-center">Cyber Security</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">

                        <img src="img/cat-12.jpg" class="img-fluid" alt="categories"></i>

                        <h5 class="my-2">
                            <a href="NOTES/OPERATINGSYSTEMNOTES.pdf" class="text-center">Operating System</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <div class="text-center mt-4">
            <a href="PDF.html" class="btn btn-primary fw-bold px-5 py-2">Download PDF</a>
        </div>
        </button>
    </div>
    <!-- Categories End -->

<!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="section-title bg-white text-center px-3">Popular Courses</h4>
                <h1 class="mb-5" style="color: #fb873f;">Explore new and trending free online courses</h1>
            </div>
            <div class="row g-4 py-2">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-1.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1"><a href="single.html" class="text-dark">HTML Course for Beginners</a> </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                4.50</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>5.8k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>4.02.00
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;">
                                <a href="vedio_html.html?vid=html.mp4">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-2.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#0ed44c;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">Front End Development-CSS
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                4.55</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>5.2k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>11.08.06
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;">
                                <a href="vedio_css.html?vid=css.mp4">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-3.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">JavaScript </h5>
                            
                            <h5 class="mb-1">full Course </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                4.46</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>76k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>2.5
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;">
                                <a href="vedio_javascript.html?vid=javascript.mp4">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-4.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#0ed44c;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">Python Programming full course
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                3.54</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>3.3k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>3.0
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;">
                                <a href="vedio_python.html?vid=python.mp4">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-5.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">SQL Tutorial for beginners
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-1"><i class="fa fa-star text-warning me-2"></i>
                                4.54</small>
                            <small class="flex-fill text-center py-1 px-1"><i class="fa fa-user-graduate me-2"></i>1.3k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-1"><i
                                    class="fa fa-user me-2"></i>Intermediate</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>5.0
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="https://youtu.be/7S_tz1z_5bA">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-6.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">ChatGPT full course
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                3.55</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>3.5k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>4.5
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="https://youtube.com/playlist?list=PLORyt8agqK6dAMEBsOL5UnXHVPbcmo4Bn&si=jJnAq4S2wYSr6k1u">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-7.jpeg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">AWS full course
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                4.53</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>1.1k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>3.0
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="https://www.youtube.com/live/E7pwMQE3arA?si=Q0LmDSDBrgwllEJg">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-8.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#0ed44c;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">Microsoft Azure Essentials
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-1"><i class="fa fa-star text-warning me-2"></i>
                                4.64</small>
                            <small class="flex-fill text-center py-1 px-1"><i class="fa fa-user-graduate me-2"></i>4.4k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-1"><i
                                    class="fa fa-user me-2"></i>Intermediate</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>3.5
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="https://www.youtube.com/live/-ki5ZpgxwhE?si=TcWAp9lsFuIam9sE">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-9.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">FREE</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">Microsoft Excel Tutorial for Beginners</h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                4.6</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>4.2k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>3.5
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="https://youtu.be/wbJcJCkBcMg?si=WcT6llnI1SpZCisS">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-10.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#0ed44c;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">Statistics For Data Science

                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-1"><i class="fa fa-star text-warning me-2"></i>
                                4.55</small>
                            <small class="flex-fill text-center py-1 px-1"><i class="fa fa-user-graduate me-2"></i>5.3k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-1"><i
                                    class="fa fa-user me-2"></i>Intermediate</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>2.5
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="https://youtu.be/8L7x5lfI32U?si=EMsdnMbZC9ADc15U">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-11.jpg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">Free</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">Programming in Java
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                4.45</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>5.5k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>2.0
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;">
                                <a href="vedio_java.html">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="img/course-12.jpeg" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">FREE</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1">Programming in C For Beginners
                            </h5>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-star text-warning me-2"></i>
                                4.5</small>
                            <small class="flex-fill text-center py-1 px-2"><i class="fa fa-user-graduate me-2"></i>1.1k+
                                Learners
                            </small>
                            <small class="flex-fill text-center py-1 px-2"><i
                                    class="fa fa-user me-2"></i>Beginner</small>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>1.5
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">Free</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="https://youtu.be/ZSPZob_1TOk?si=pKik6mFKqR5eOT9i">Watch
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses End -->
  

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
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>402107 Raygad,Lonere,Maharashtra</p>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>