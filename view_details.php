<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
session_start();
// Include database connection file
require_once "config.php";

// Check if email is set in session
if (!isset($_SESSION["email"])) {
    // Redirect user to login page or handle the error
    header("Location: login.php");
    exit();
}



$email = $_SESSION["email"];
$sql = "SELECT Name, Email, Insurance, Gender, Password, PhoneNumber, Address, DateOfBirth, UserID  FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>USER DETAILS</title>
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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
   body {
    font-family: Arial, sans-serif;
    background-color: #1f3a8e;
    margin: 0;
    padding: 0;
}
   
        .container1 {
    max-width: 600px;
    margin-bottom:30px;
    margin: 7px auto;
    background-color: rgba(144, 156, 214, 0.5);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

}
.container1 p strong{
    color:rgb(255, 230, 0);
}
.container1 p{
    color:black;
}

        h1 {
            font-size: 36px;
            color: #000080;
            text-align: center;
            margin-bottom: 20px;
        }

   
    </style>
</head>
<body>
      <!-- Topbar -->
      <div class="container-fluid1 py-2 d-none d-lg-flex">
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
                    <a href="view_details.php" class="nav-item nav-link">PROFILE</a>
                    <a href="user_update_data.html" class="nav-item nav-link">UPDATE</a>
                    <a href="emergency_contacts_form.html" class="nav-item nav-link">EMERGENCY CONTACT</a>
                    <a href="booking_request_form.html" class="nav-item nav-link">TRIP</a>
                    <a href="payment_form.html" class="nav-item nav-link">PAYMENT</a>
                    <a href="feedback_form.html" class="nav-item nav-link">RATING</a>
                    <a href="logout.php" class="nav-item nav-link">LOGOUT</a>
                </div>
                <div class="ms-auto d-none d-lg-flex">
                    <a class="btn btn-lg-square btn-primary me-2" href="https://www.instagram.com/djgreens_250"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg-square btn-primary me-2" href="https://twitter.com/Dj_Greens250"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>

    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5 mt-4">
            <h1 class="display-2 text-white mb-3 animated slideInDown">USER DETAILS</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item" aria-current="page">Welcome Back</li>
                </ol>
            </nav>
        </div>
    </div>
  
    <div class="container1">
    <h1>User Details</h1>
    <p><strong>UserID        :    </strong> <?php echo $userData["UserID"]; ?></p>
    <p><strong>Name          :    </strong> <?php echo $userData["Name"]; ?></p>
    <p><strong>Phone Number  :    </strong> <?php echo $userData["PhoneNumber"]; ?></p>
    <p><strong>Email         :    </strong> <?php echo $userData["Email"]; ?></p>
    <p><strong>Address       :    </strong> <?php echo $userData["Address"]; ?></p>
    <p><strong>DateOfBirth   :    </strong> <?php echo $userData["DateOfBirth"]; ?></p>
    <p><strong>Gender        :    </strong> <?php echo $userData["Gender"]; ?></p>
    <p><strong>PASSWORD      :    </strong> <?php echo $userData["Password"]; ?></p>
    <p><strong>Insurance     :    </strong> <?php echo $userData["Insurance"]; ?></p>
</div class="container1">


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

    <div class="container-fluid copyright bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="about.html">ABS Lines (Ambulance Booking System Lines)</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a href="https://www.instagram.com/djgreens_250">Laurier HABIYAREMYE</a></p>
                </div>
            </div>
        </div>
    </div>

    <a href="index.php" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
