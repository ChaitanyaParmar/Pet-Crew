<?php
    include_once("header.php");
    $cnn = mysqli_connect("localhost", "root", "", "project");
?>
    <style>
        body {
            background-image: url(images/resources/dog.jpg);
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .text {
            width: 95%;
            position: absolute;
            top: 80%;
            text-align: right;
        }

        .text h1 {
            font-size: 45px;
        }

        .text p {
            font-size: 20px;
            margin: 5px 0 20px;
        }

        .wellcome_area {
            padding-bottom: 80px;
            padding-top: 148px;
            position: relative;
        }

        .contact-area {
            padding-top: 30px;
        }


    </style>
    <!--Start rev slider wrapper-->
    <div class="rev_slider" data-version="5.0">
        <div class="text">
            <h1 style="top: 55vh; color:black; font-family: 'Bebas Neue', cursive; font-size: 60px;">PET CREW</h1>
            <p style="top: 55vh; color:black;">A Place Dedicated To The Happiness Of Animals</p>
        </div>
    </div>
    <!--End rev slider wrapper-->
    <!--.wellcome_area-->
    <section class="wellcome_area" style="margin-top: 100vh;">
        <div class="container">
            <div class="section-title text-center">
                <h2>Services We Provide</h2>
                <h6><span class="flaticon-pawprint"></span></h6>
                <div class="border"></div>
                <p>We Came Up With Some Of The Best Professionals To Help You With Whatever You Need For Your Pets. </p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="wellcome">
                        <div class="img-holder">
                            <figure><a href="groomer.php"><img src="images/services/groom.jpg" alt="Images"></a>
                            </figure>
                        </div>
                        <div class="wellcome-text">
                            <h4><a href="groomer.php">Pet Grooming</a><span>01</span></h4>
                            <p>"A Well-Groomed Dog Is A Happy Dog And A Happy Dog Is A Healthy Dog." Check Out Our
                                Professional Groomers And Unlock The Value Of Our Dog Grooming Services. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="wellcome">
                        <div class="img-holder">
                            <figure><a href="doctor.php"><img src="images/services/doctor.jpg" alt="Images"></a>
                            </figure>
                        </div>
                        <div class="wellcome-text">
                            <h4><a href="doctor.php">VETERINARY HELP</a><span>02</span></h4>
                            <p>All Pets Deserve Great Doctors. So We Came Up With Some Of The Knowledgeable Doctors.
                                Make Sure To Give A Visit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="wellcome">
                        <div class="img-holder">
                            <figure><a href="trainer.php"><img src="images/services/trainer.jpg" alt="Images"></a>
                            </figure>
                        </div>
                        <div class="wellcome-text">
                            <h4><a href="trainer.php">Pet Training</a><span>03</span></h4>
                            <p>There's A Saying "A Well-Behaved Dog Is A Welcomed Dog." Our Trainers Will Make Your High
                                Energy Dog Into An Ideal Companion. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/wellcome_area-->

    <!--Start testimonial_area-->
    <section class="testimonial_area" style="background-image:url(images/blog/bg3.jpg);">
        <div class="container">
            <div class="section-title text-center">
                <h2>WHAT OUR CLIENTS SAY</h2>
                <h6><span class="flaticon-pawprint"></span></h6>
                <div class="border"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial">
                        <!--Start single item-->
                        <div class="single-item" style="background-image:url(images/blog/bg4.jpg);">
                            <div class="img-holder">
                                <img src="images/blog/3.png" alt="Images">
                            </div>
                            <div class="testimonial_box">
                                <p>Climb leg paw at your fat belly but white cat sleeps on a<br> black shirt. Swat at
                                    dog have secret plans wake up<br> wander around the house.</p>
                                <h4>Rihana Doe</h4>
                                <h6>Founder</h6>
                            </div>
                        </div>
                        <!--End single item-->
                        <!--Start single item-->
                        <div class="single-item" style="background-image:url(images/blog/bg4.jpg);">
                            <div class="img-holder">
                                <img src="images/blog/4.png" alt="Images">
                            </div>
                            <div class="testimonial_box">
                                <p>Climb leg paw at your fat belly but white cat sleeps on a<br> black shirt. Swat at
                                    dog have secret plans wake up<br> wander around the house.</p>
                                <h4>Henry Doe</h4>
                                <h6>Founder</h6>
                            </div>
                        </div>
                        <!--End single item-->
                        <!--Start single item-->
                        <div class="single-item" style="background-image:url(images/blog/bg4.jpg);">
                            <div class="img-holder">
                                <img src="images/blog/3.png" alt="Images">
                            </div>
                            <div class="testimonial_box">
                                <p>Climb leg paw at your fat belly but white cat sleeps on a<br> black shirt. Swat at
                                    dog have secret plans wake up<br> wander around the house.</p>
                                <h4>Rihana Doe</h4>
                                <h6>Founder</h6>
                            </div>
                        </div>
                        <!--End single item-->
                        <!--Start single item-->
                        <div class="single-item" style="background-image:url(images/blog/bg4.jpg);">
                            <div class="img-holder">
                                <img src="images/blog/4.png" alt="Images">
                            </div>
                            <div class="testimonial_box">
                                <p>Climb leg paw at your fat belly but white cat sleeps on a<br> black shirt. Swat at
                                    dog have secret plans wake up<br> wander around the house.</p>
                                <h4>Henry Doe</h4>
                                <h6>Founder</h6>
                            </div>
                        </div>
                        <!--End single item-->
                        <!--Start single item-->
                        <div class="single-item" style="background-image:url(images/blog/bg4.jpg);">
                            <div class="img-holder">
                                <img src="images/blog/3.png" alt="Images">
                            </div>
                            <div class="testimonial_box">
                                <p>Climb leg paw at your fat belly but white cat sleeps on a<br> black shirt. Swat at
                                    dog have secret plans wake up<br> wander around the house.</p>
                                <h4>Rihana Doe</h4>
                                <h6>Founder</h6>
                            </div>
                        </div>
                        <!--End single item-->
                        <!--Start single item-->
                        <div class="single-item" style="background-image:url(images/blog/bg4.jpg);">
                            <div class="img-holder">
                                <img src="images/blog/4.png" alt="Images">
                            </div>
                            <div class="testimonial_box">
                                <p>Climb leg paw at your fat belly but white cat sleeps on a<br> black shirt. Swat at
                                    dog have secret plans wake up<br> wander around the house.</p>
                                <h4>Henry Doe</h4>
                                <h6>Founder</h6>
                            </div>
                        </div>
                        <!--End single item-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End testimonial_area-->
<?php include_once("footer.php"); ?>