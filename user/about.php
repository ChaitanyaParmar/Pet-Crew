<?php
include_once("header.php");
$cnn = mysqli_connect("localhost", "root", "", "project");
?>
<style>
  .wellcome_area {
    padding-bottom: 5px;
  }

  .wellcome_area p {
    font-size: 18px;
    float: left;
    text-align: left;
  }

  .border p {
    padding-top: 20px;
  }
</style>
<section class="slider_area" style="background-image:url(images/slider/4.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="slider">
          <h2>ABOUT US</h2>
          <p><a href="index.php">Home </a><span>/</span> About Us </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/slider_area-->
<!--.wellcome_area-->
<section class="wellcome_area">
  <div class="container">
    <div class="section-title text-center">
      <h2>About Us</h2>
      <h6><span class="flaticon-pawprint"></span></h6>
      <div class="border"></div>
      <br><br>
      <p>We are your confided in a pet store in India. Our platform offers you a space for pets, here you will discover Dogs, Cats, Birds just as all the material that suit them. You will likewise discover sustenance and adornments for all pets.<br><br>We likewise offer shopping for food with craftsman items or natural bread kitchen for our 4-legged companions and the “BARF” the new eating regimen for pooch and feline dependent on 84% least meat!<br><br>We feature brands, for example, Pedigree or PetSutra or Kong, and other people who utilize just new items in the structure of their croquettes. Yet, you will likewise discover brands like Royal Canin and so on.</p>
    </div>
  </div>
</section>

<!--/wellcome_area-->

<!--team-->
<section class="team-area">
  <div class="container">
    <div class="section-title text-center">
      <h2>OUR TEAM</h2>
      <h6><span class="flaticon-pawprint"></span></h6>
      <div class="border"></div>
      <p>Thug cat destroy couch eat the fat cats food chirp at birds lie on your belly and<br> purr when you are asleep with tail in the air. </p>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Start single-item -->
        <div class="our-team wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
          <div class="img-holder">
            <figure><img src="images/team/Chaitanya1.jpeg" alt="Images"></figure>
          </div>
          <div class="our-team-text">
            <h4>Chaitanya Parmar</h4>
            <p>196170307083</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Start single-item -->
        <div class="our-team wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
          <div class="img-holder">
            <figure><img src="images/team/Kevin.jpeg" alt="Images"></figure>
          </div>
          <div class="our-team-text">
            <h4>Kevin Patel</h4>
            <p>196170307094</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Start single-item -->
        <div class="our-team wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
          <div class="img-holder">
            <figure><img src="images/team/Margil2.jpeg" alt="Images"></figure>
          </div>
          <div class="our-team-text">
            <h4>Margil Patel</h4>
            <p>196170307095</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Start single-item -->
        <div class="our-team wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
          <div class="img-holder">
            <figure><img src="images/team/Vrajj.jpeg" alt="Images"></figure>
          </div>
          <div class="our-team-text">
            <h4>Vraj Patel</h4>
            <p>196170307105</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Start single-item -->
        <div class="our-team wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
          <div class="img-holder">
            <figure><img src="images/team/Kavit.jpeg" alt="Images"></figure>
          </div>
          <div class="our-team-text">
            <h4>Kavit Rana</h4>
            <p>196170307114</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Start single-item -->
        <div class="our-team wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
          <div class="img-holder">
            <figure><img src="images/team/Tanmay.jpeg" alt="Images"></figure>
          </div>
          <div class="our-team-text">
            <h4>Tanmay Panchal</h4>
            <p>196170307147</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/team-->

<!--Start counter_area -->
<section class="counter_area" style="background-image:url(images/blog/bg2.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-6">
        <!-- Start single-item -->
        <div class="counter-text sf-left">
          <?php
          $d = mysqli_num_rows(mysqli_query($cnn, "Select * from doctor;"));
          $t = mysqli_num_rows(mysqli_query($cnn, "Select * from trainer;"));
          $g = mysqli_num_rows(mysqli_query($cnn, "Select * from groomer;"));

          $p = $d + $t + $g;
          ?>
          <h2 class="sF-counter" data-from="0" data-to="<?php echo $p; ?>" data-speed="<?php echo $p; ?>" data-refresh-interval="50"><?php echo $p; ?></h2>
          <div class="border"></div>
          <p class="">Professionals</p>
        </div>
        <!-- Eind single-item -->
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6">
        <!-- Start single-item -->
        <div class="counter-text">
          <h2 class="sF-counter" data-from="0" data-to="<?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from shop;")); ?>" data-speed="<?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from shop;")); ?>" data-refresh-interval="50"><?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from shop;")); ?></h2>
          <div class="border"></div>
          <p>Shops</p>
        </div>
        <!-- Eind single-item -->
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6">
        <!-- Start single-item -->
        <div class="counter-text">
          <h2 class="sF-counter" data-from="0" data-to="<?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from product;")); ?>" data-speed="<?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from product;")); ?>" data-refresh-interval="50"><?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from product;")); ?></h2>
          <div class="border"></div>
          <p>Products</p>
        </div>
        <!-- Eind single-item -->
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6">
        <!-- Start single-item -->
        <div class="counter-text sf-right">
          <h2 class="sF-counter" data-from="0" data-to="<?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from user;")); ?>" data-speed="<?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from user;")); ?>" data-refresh-interval="50">
            <?php echo mysqli_num_rows(mysqli_query($cnn, "Select * from user;")); ?></h2>
          <div class="border"></div>
          <p>Customers</p>
        </div>
        <!-- Eind single-item -->
      </div>
    </div>
  </div>
</section>
<!--End counter_area -->

<?php include_once("footer.php"); ?>