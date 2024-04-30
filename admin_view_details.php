<?php

/**
*Created by: Laurier HABIYAREMYE 
* Registration Number: 222003068 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: AMBULANCE BOOKING SYSTEM
 
 */

session_start();

// Include database connection file
require_once "config.php";

// Check if email is set in session
if (!isset($_SESSION["email"])) {
    // Redirect user to login page or handle the error
    header("Location: admin_login.php");
    exit();
}

// Retrieve user details from the database
$email = $_SESSION["email"];
$sql = "SELECT Name, Email, Password, AdminID, Role, Phonenumber FROM admin WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch user data
    $userData = $result->fetch_assoc();

    // Close prepared statement
    $stmt->close();
} else {
    // No user found with the provided email
    // Handle the error or redirect user to an error page
    echo "No user found with the provided email.";
    exit();
}

// Close database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>DETAILS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
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

/**
*Created by: Laurier HABIYAREMYE 
* Registration Number: 222003068 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: AMBULANCE BOOKING SYSTEM
 
 */
   
    </style>
</head>
<body>
     <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>KGL _ RWANDA</small>
                    <small class="me-3"><i class="fa fa-clock me-2"></i>Mon-Sun 24/7 Open</small>
                </div>

            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Brand Start -->
    <div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <i class="bi bi-telephone-inbound fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Call Now</h5>
                        <span>+250 790 277 464</span>
                    </div>
                </div>
                <a href="index.html" class="h1 text-white mb-0">OPT<span class="text-dark">System</span></a>
                <div class="d-flex">
                    <i class="bi bi-envelope fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Mail Now</h5>
                        <span>belyse@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Navbar Start -->
 <div class="container-fluid sticky-top">
  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
          <a href="index.html" class="navbar-brand d-lg-none">
              <h1 class="text-primary m-0">OPT<span class="text-dark">System</span></h1>
          </a>
          <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
              data-bs-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="admin_view_details.php" class="nav-item nav-link">PROFILE</a>
                    <a href="admin_update_data.html" class="nav-item nav-link">UPDATE</a>
                    <a href="admin_emergency_contacts_form.html" class="nav-item nav-link">EM_CONTACTS</a>
                    <a href="admin_booking_request_form.html" class="nav-item nav-link">TRIP</a>
                    <a href="trip.html" class="nav-item nav-link">SET_TRIP</a>
                    <a href="ambulance_registration.html" class="nav-item nav-link">AMBULANCE</a>
                    <a href="admin_payment_form.html" class="nav-item nav-link">PAY</a>
                    <a href="report_analytics.html" class="nav-item nav-link">REPORT</a>
                    <a href="actions.html" class="nav-item nav-link">DATABASE</a>
                    <a href="logout.php" class="nav-item nav-link">LOGOUT</a>
              </div>
          <div class="ms-auto d-none d-lg-flex">
              <a class="btn btn-square btn-light mx-1" href="https://www.instagram.com/belysearlande"><i class="fab fa-instagram"></i></a>
              <a class="btn btn-square btn-light mx-1" href="https://twitter.com/rossa_arly"><i class="fab fa-twitter"></i></a>
          </div>
      </div>
  </nav>
</div>
</div>
<!-- Navbar End -->


         <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5 mt-4">
            <h1 class="display-2 text-white mb-3 animated slideInDown">ADMINISTRATOR DETAILS</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Details to be seen -->
    <div class="container1">
    <h1>ADMINISTRATOR PROFILE</h1>
    <p><strong>AdminID       :    </strong> <?php echo $userData["AdminID"]; ?></p>
    <p><strong>Name          :    </strong> <?php echo $userData["Name"]; ?></p>
    <p><strong>Phone         :    </strong> <?php echo $userData["Phonenumber"]; ?></p>
    <p><strong>Email         :    </strong> <?php echo $userData["Email"]; ?></p>
    <p><strong>Role          :    </strong> <?php echo $userData["Role"]; ?></p>
    <p><strong>PASSWORD      :    </strong> <?php echo $userData["Password"]; ?></p>
</div class="container1">

<!-- Details to be seen end -->


  <!-- Footer Start -->
  <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-6 pe-lg-5">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="h1 text-primary mb-0">OPT<span class="text-white">System</span></h1>
                    </a>
                    <p class="fs-5 mb-4">Have a question or need assistance? Reach out to us anytime, day or night. Our friendly team is standing by to provide prompt and professional support for all your pregnancy test service needs. Get in touch with us now!</p>
                    <p><i class="fa fa-map-marker-alt me-2"></i>KIGALI, RWANDA</p>
                    <p><i class="fa fa-phone-alt me-2"></i>+250 790 277 464</p>
                    <p><i class="fa fa-envelope me-2"></i>belyse@gmail.com</p>
                    <div class="d-flex mt-4">
                        <a class="btn btn-square btn-light mx-1" href="https://www.instagram.com/belysearlande"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-light mx-1" href="https://twitter.com/rossa_arly"><i class="fab fa-twitter"></i></a>
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
                               <input type="email" name="email" class="form-control border-0 py-3 px-4" style="background: rgba(165, 121, 247, 0.1);" placeholder="Your Email Address" required>
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
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4" style="color: black;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="index.php">OPT system (Online Pregnancy Test System)</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a href="https://www.instagram.com/belysearlande">Musemakweli Rossa Belyse Arlande</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="index.php" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>


</html>