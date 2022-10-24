<!DOCTYPE html>
<html>

<!-- Mirrored from html.commonsupport.xyz/2017/Carlisle-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Sep 2021 13:29:49 GMT -->

<head>
  <meta charset="utf-8">
  <title>Pet Crew</title>
  <!-- Stylesheets -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link href="css/responsive.css" rel="stylesheet">
  <link rel="icon" href="images/logo/favicon.ico">
  <script src="https://kit.fontawesome.com/3327678131.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>
<style>
  .menu {
    width: 1300px;
  }

  .main-menu .navigation li a {
    color: black;
    font-size: 17px;
  }
</style>

<body>
  <!--Page Wrapper-->
  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!--Header top area-->
    <header class="main-header header-style-one">
      <section class="header_top_area">
        <div class="container">
          <div class="header">
            <div class="header_top_left">
              <ul>
                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    info@petcrew.com</a></li>
                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>
                    +01 234 56789</a></li>
              </ul>
            </div>
            <div class="header_top_right">
              <ul>
                <li><a href="https://www.facebook.com/Pet-Crew-108844805019255"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/petcrew_00/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!--/header_top_area-->

      <!--main_mane-->
      <?php
      session_start();
      if (isset($_SESSION["id"])) {
        $qry1 = "Select * from user where uid = $_SESSION[id]";
        $conn = mysqli_connect("localhost", "root", "", "project");

        $result1 = $conn->query($qry1);
        $row = $result1->fetch_assoc();
        // $img = $row["img"];
        $uname = $row["uname"];
      ?>
        <section class="main-menu-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="logo"><a href="index.php"><img src="images/logo/main-logo.png" width="200px" height="60px" alt=""></a></div>
                <div class="menu clearfix">
                  <nav class="main-menu pull-rigth">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                      <ul class="navigation clearfix">
                        <li class="current dropdown"><a href="index.php">Home</span></a></li>
                        <li><a href="about.php">About us</a></li>
                        <li class="dropdown"><a href="services.php">Services</span></a>
                          <ul>
                            <li><a href="doctor.php">Doctor</a></li>
                            <li><a href="trainer.php">Trainer</a></li>
                            <li><a href="groomer.php">Groomer</a></li>
                          </ul>
                        </li>
                        <li class="dropdown"><a href="#">Shop</a>
                          <ul>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="pcart.php">Shop Cart</a></li>
                            <!-- <li><a href="shopcheckout.php">Shop Checkout</a></li> -->
                            <li><a href="pet.php">Pets</a></li>
                          </ul>
                        </li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li class="dropdown" style="color: black;"><a href="#"><i style="font-size: 20px;" class="fas fa-user"></i>  <?php echo $uname; ?> </a>
                          <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="forgotpass.php">Change Password</a></li>
                            <li><a href="donate.php">Donate</a></li>
                            <li><a href="history.php">Appointment History</a></li>
                            <li><a href="logout.php">Logout</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php
      } else {
      ?>
        <section class="main-menu-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="logo"><a href="index.php"><img src="images/logo/main-logo.png" width="200px" height="60px" alt=""></a></div>
                <div class="menu clearfix">
                  <nav class="main-menu pull-rigth">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                      <ul class="navigation clearfix">
                        <li class="current dropdown"><a href="index.php">Home</span></a></li>
                        <li><a href="about.php">About us</a></li>
                        <li class="dropdown"><a href="services.php">Services</span></a>
                          <ul>
                            <li><a href="doctor.php">Doctor</a></li>
                            <li><a href="trainer.php">Trainer</a></li>
                            <li><a href="groomer.php">Groomer</a></li>
                          </ul>
                        </li>
                        <li class="dropdown"><a href="#">Shop</a>
                          <ul>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="shopcart.php">Shop Cart</a></li>
                            <li><a href="pet.php">Pet</a></li>
                          </ul>
                        </li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li class="dropdown"><a href="#">Account</a>
                          <ul>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php } ?>
    </header>