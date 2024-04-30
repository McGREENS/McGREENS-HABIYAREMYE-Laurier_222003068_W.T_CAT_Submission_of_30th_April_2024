<!DOCTYPE html>
<html lang="en">


    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->




<head>
    <meta charset="utf-8">
    <title>ABS-Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- icon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>

    #submitBtn {
        background-color: #007bff; 
        color: white; 
        padding: 10px 20px;
        border: none; 
        border-radius: 5px;
        cursor: pointer; 
        transition: background-color 0.3s;
    }

   
    #submitBtn:hover {
        background-color: #0056b3; 
    }

</style>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("appointmentForm");
        const successMessage = document.getElementById("successMessage");

        form.addEventListener("submit", function (event) {
            event.preventDefault(); 

            const formData = new FormData(form);

            fetch(form.action, {
                method: "POST",
                body: formData,
            })
            .then(response => {
                if (response.ok) {
                    successMessage.style.display = "block"; 
                }
                throw new Error("Network response was not ok.");
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });
</script>

</head>

<body>
    <!-- Spinner  -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner  -->


    <!-- Topbar  -->
    <div class="container-fluid py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>RN1, HUYE, RWANDA</small>
                    <small class="me-3"><i class="fa fa-clock me-2"></i>Mon-Sun 24/7 Open</small>
                </div>

            </div>
        </div>
    </div>
    <!-- Topbar  -->


    <!-- Brand  -->
    <div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <i class="bi bi-telephone-inbound fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Call Now</h5>
                        <span>+250 780 115 764</span>
                    </div>
                </div>
                <a href="index.html" class="h1 text-white mb-0">ABS<span class="text-dark">Lines</span></a>
                <div class="d-flex">
                    <i class="bi bi-envelope fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Mail Now</h5>
                        <span>laurierhab@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand  -->


    <!-- Navbar  -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
                <a href="index.html" class="navbar-brand d-lg-none">
                    <h1 class="text-primary m-0">ABS<span class="text-dark">Lines</span></h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item nav-link active">HOME</a>
                        <a href="about.html" class="nav-item nav-link">ABOUT</a>
                        <a href="service.php" class="nav-item nav-link">SERVICES</a>
                        <a href="appointment.html" class="nav-item nav-link">APPOINTMENT</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">MORE</a>
                            <div class="dropdown-menu bg-light m-0">
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                                
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">LOGIN</a>
                             <div class="dropdown-menu bg-light m-0">
                                <a href="login.html" class="nav-item nav-link">User</a>
                                <a href="admin_login.html" class="nav-item nav-link">Admin</a>
                                
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">REGISTER</a>
                            <div class="dropdown-menu bg-light m-0">
                                <a href="user_registration.html"class="nav-item nav-link">User</a>
                                <a href="admin_registration.html"class="nav-item nav-link">Admin</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="ms-auto d-none d-lg-flex">
                        <a class="btn btn-lg-square btn-primary me-2" href="https://www.instagram.com/djgreens_250"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="https://twitter.com/Dj_Greens250"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar -->


 
    <!--  Standards-->

    <div class="container-fluid header-carousel px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <h1 class="display-1 text-white animated slideInRight mb-3">Award Winning Ambulance Center</h1>
                                    <p class="mb-5 animated slideInRight"><b>ABS</b> was found by <b>Laurier HABIYAREMYE</b><br>in 2024, when he was a university student. <br> He was intended to make the best Ambulance service provider to win more awards and now on.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Menya byinshi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <h1 class="display-1 text-white animated slideInLeft mb-3">Expert Doctors & Ambulance Assistants</h1>
                                    <p class="mb-5 animated slideInLeft">ABS, have grown due to there Expert ddoctors and ambulance assistants who work hard to make our clients feer confortable when working with us.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Menya Byinshi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
   <!--  Standards-->


    <!-- About  -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0">
                        <div class="col-6">
                            <img class="img-fluid" src="img/about-1.jpg" style="width: 270px;">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="img/about-2.jpg" style="width: 270px;">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="img/about-3.jpg" style="width: 270px;">
                        </div>
                        <div class="col-6">
                            <div class="bg-primary w-100 h-100 mt-n5 ms-n5 d-flex flex-column align-items-center justify-content-center">
                                <div class="icon-box-light">
                                    <i class="bi bi-award text-dark"></i>
                                </div>
                                <h1 class="display-1 text-white mb-0" data-toggle="counter-up">2</h1>
                                <small class="fs-5 text-white">Years Experience</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4">Experienced Emergency Responders</h1>
                    <p class="mb-4">At <b>ABS Lines</b>, we take pride in our team of highly-trained and experienced emergency responders. Our dedicated professionals are equipped to handle a wide range of medical emergencies with efficiency and compassion. With years of experience in providing urgent medical care, our responders are adept at navigating the unique challenges of emergency situations in Rwanda. </p>
                    <div class="row g-4 g-sm-5 justify-content-center">
                        <div class="col-sm-6">
                            <div class="about-fact btn-square flex-column rounded-circle bg-primary ms-sm-auto">
                                <p class="text-white mb-0">Awards Winning</p>
                                <h1 class="text-white mb-0" data-toggle="counter-up">79</h1>
                            </div>
                        </div>
                        <div class="col-sm-6 text-start">
                            <div class="about-fact btn-square flex-column rounded-circle bg-secondary me-sm-auto">
                                <p class="text-white mb-0">Complete Cases</p>
                                <h1 class="text-white mb-0" data-toggle="counter-up">1079</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-fact mt-n130 btn-square flex-column rounded-circle bg-dark mx-sm-auto">
                                <p class="text-white mb-0">Happy Clients</p>
                                <h1 class="text-white mb-0" data-toggle="counter-up">879</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  -->





    <!-- Features -->
    <div class="container-fluid feature mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 pt-lg-5">
                    <div class="bg-white p-5 mt-lg-5">
                        <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.3s">The Best Ambulance providers & Reliable Emergency Assistance</h1>
                        <p class="mb-4 wow fadeIn" data-wow-delay="0.4s">Enhancing our ambulance services with cutting-edge medical testing and diagnostic tools, ensuring swift and precise assessments for effective emergency care.</p>
                        <div class="row g-5 pt-2 mb-5">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-person-plus text-dark"></i>
                                </div>
                                <h5 class="mb-3">Experience Doctors</h5>
                                <span>Our team comprises experienced physicians dedicated to providing top-quality medical care.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-check-all text-dark"></i>
                                </div>
                                <h5 class="mb-3">Advanced Ambulance Technology</h5>
                                <span>Our commitment to excellence is reflected in our utilization of advanced ambulance technology.</span>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 wow fadeIn" data-wow-delay="0.5s" href="">Explore More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row h-100 align-items-end">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center justify-content-center" style="min-height: 300px;">
                                <button type="button" class="btn-play" data-bs-toggle="modal"
                                    data-src="img/ LADIPOE  Running feat FireboyDML Official Music Video_480p.mp4" data-bs-target="#videoModal">
                                    <span></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-primary p-5">
                                <div class="experience mb-4 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-white">Rapid response</span>
                                        <span class="text-white">90%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="experience mb-4 wow fadeIn" data-wow-delay="0.4s">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-white">Response Accuracy</span>
                                        <span class="text-white">95%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="experience mb-0 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-white">Transit Time Accuracy</span>
                                        <span class="text-white">90%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features  -->


    <!-- Video Modal  -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Our Video</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                <div class="ratio ratio-16x9">
                  
                    <video id="video" controls>
                        <source src="img/ LADIPOE  Running feat FireboyDML Official Music Video_480p" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal  -->

<script>
    
    var video = document.getElementById('video');
    $('#videoModal').on('shown.bs.modal', function () {
        
        video.play();
    });

   
    $('#videoModal').on('hidden.bs.modal', function () {
       
        video.pause();
    });
</script>





<!-- Appointment -->
<div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-4">We Ensure You Will Always Get The Best Result</h1>
                    <p>Caring for your health is our top priority. Contact us today to access reliable ambulance services and compassionate care when you need it most. Our dedicated team is here to assist you 24/7.</p>
                    <p class="mb-4">Have a question or need assistance? Reach out to us anytime, day or night. Our friendly team is standing by to provide prompt and professional support for all your ambulance service needs. Get in touch with us now!</p>
                    <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.3s">
                        <div class="icon-box-primary">
                            <i class="bi bi-geo-alt text-dark fs-1"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Office Address</h5>
                            <span>RN1, HUYE, RWANDA</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.4s">
                        <div class="icon-box-primary">
                            <i class="bi bi-clock text-dark fs-1"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Office Time</h5>
                            <span>Mon-Sun 24hrs</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="mb-4">Online Appointment</h2>
                    <form id="appointmentForm" action="submit_appointment.php" method="post">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your Mobile">
                                    <label for="mobile">Your Mobile</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select" id="service" name="service">
                                        <option selected>Prefer a call</option>
                                        <option value="email">Prefer an Email</option>
                                        <option value="visit">Prefer a visit</option>
                                    </select>
                                    <label for="service">Choose A Contact way</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 130px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                            <button type="submit" id="submitBtn">Submit Now</button>
                            <div id="successMessage" style="display: none;">Appointment submitted successfully</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment  -->
    <script src="ajax.js"></script>


   

    <!-- Testimonial  -->

    <?php
// connection to the database
$connection = new mysqli('localhost', 'habiyaremye', 'laurier', 'ambulance_booking_syst', 5306);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve testimonial data from the feedbackandratings table
$sql = "SELECT Comments, UserID, FeedbackDateTime FROM feedbackandratings";
$result = $connection->query($sql);

// Check if there are any testimonials
if ($result->num_rows > 0) {
    // Output testimonial section header
    echo '<div class="container-fluid testimonial py-5">
            <div class="container pt-5">
                <div class="row gy-5 gx-0">
                    <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 text-white mb-4">What Clients Say About Our Ambulance Services!</h1>
                        <p class="text-white mb-5">At ABS Lines, we take pride in delivering exceptional ambulance services and ensuring the well-being of our clients. Your satisfaction and feedback are invaluable to us, and we strive to exceed your expectations every time.</p>
                        <a href="testimonial.html" class="btn btn-primary py-3 px-5">More Testimonials</a>
                    </div>
                    <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.5s">
                        <div class="bg-white p-5">
                            <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">';

    // Loop through testimonial data and generate HTML for each testimonial
    while ($row = $result->fetch_assoc()) {
        echo '<div class="testimonial-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-chat-left-quote text-dark"></i>
                    </div>
                    <p class="fs-5 mb-4">' . $row['Comments'] . '</p>
                    <div class="ps-3">
                        <h5 class="mb-1">' . $row['UserID'] . '</h5>
                        <span class="text-primary">' . $row['FeedbackDateTime'] . '</span>
                    </div>
                </div>';
    }

    // Close testimonial section HTML
    echo '</div>
            </div>
        </div>
    </div>
</div>';
} else {
    // Output a message if there are no testimonials
    echo "No testimonials available.";
}

// Close database connection
$connection->close();
?>
     <!-- Testimonial end -->

    


    <!-- Footer  -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-6 pe-lg-5">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="h1 text-primary mb-0">ABS<span class="text-white">Lines</span></h1>
                    </a>
                    <p class="fs-5 mb-4">Have a question or need assistance? Reach out to us anytime, day or night. Our friendly team is standing by to provide prompt and professional support for all your ambulance service needs. Get in touch with us now!</p>
                    <p><i class="fa fa-map-marker-alt me-2"></i>RN1, HUYE, RWANDA</p>
                    <p><i class="fa fa-phone-alt me-2"></i>+250 780 115 764</p>
                    <p><i class="fa fa-envelope me-2"></i>laurierhab@gmail.com</p>
                    <div class="d-flex mt-4">
                        <a class="btn btn-square btn-light mx-1" href="https://www.instagram.com/djgreens_250"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-light mx-1" href="https://twitter.com/Dj_Greens250"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Quick Links</h4>
                              <a class="btn btn-link" href="about.html">About Us</a>
                              <a class="btn btn-link" href="service.php">Our Services</a>
                              <a class="btn btn-link" href="team.html">Support</a>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Popular Links</h4>
                              <a class="btn btn-link" href="about.html">About Us</a>
                              <a class="btn btn-link" href="service.php">Our Services</a>
                              <a class="btn btn-link" href="team.html">Support</a>
                        </div>
                        <div class="col-sm-12">
                           <h4 class="text-light mb-4">Newsletter</h4>
                           <form id="newsletterForm" method="post" action="subscribe_newsletter.php">
                             <div class="w-100">
                              <div class="input-group">
                               <input type="email" name="email" class="form-control border-0 py-3 px-4" style="background: rgba(255, 255, 255, .1);" placeholder="Your Email Address" required>
                               <button type="submit" class="btn btn-primary px-4" name="subscribe">Request News</button>
                             </div>
                           </div>
                        </form>
                       </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer  -->


    <!-- Copyright  -->
    <div class="container-fluid copyright bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="index.php">ABS Lines (Ambulance Booking System Lines)</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a href="https://www.instagram.com/djgreens_250">Laurier HABIYAREMYE</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright  -->

    <a href="index.php" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->




</html>