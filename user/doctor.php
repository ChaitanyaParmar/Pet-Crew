<?php
include_once("header.php");
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    .ss {

        /* text-align:center;  */
        text-align: left;
        /* padding:20px; */
        position: relative;

    }

    .izoom img {
        transition: transform 0.25s ease;
        cursor: zoom-in;
        padding-top: 20px;
    }

    .izoom img:hover {
        /* padding-top: 20px; */
        -webkit-transform: scale(2);
        transform: scale(1.5);
        cursor: zoom-out;
        position: relative;
        top: 24px;
        left: 20px;
    }
</style>

<div class="col-12" class="card-body"><br>
    <form role="form" method="post" action="">
        <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="slider">
                            <h2>DOCTOR</h2>
                            <p> <a href="index.php">Home </a><span>/</span> <a href="services.php">Services</a> <span>/</span> <a href="doctor.php">Doctor</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="shop-section" style="padding-top: 30px;padding-bottom: 60px;">
            <div class="container">
                <h2 style="font-size:35px; font-weight:bold; font-family:Adobe Caslon Pro;text-decoration:underline; text-align:center; color: black; margin-bottom: 20px;">Doctor Details</h2>

                <?php

                if (isset($_SESSION["id"])) {
                    $uid = $_SESSION["id"];
                } else {
                    $uid = "";
                }

                $cnn = mysqli_connect("localhost", "root", "", "project");
                $query = "Select * from doctor";
                $result = $cnn->query($query);
                $str = "<table class='table ss' style='background-color:white; border:5px double black; margin-left:60px; width:90%;'>";
                while ($row = $result->fetch_assoc()) {
                    $did = $row["did"];
                    $ans = $row["rate"];
                    $image = $row["img"];

                    $str .= "<tr class='row'><td class='izoom' style='border-top:3px solid black;'>̥<img src='../doctor/images/doctors/$image' height='145px' width='150px' style='margin-left:40px; margin-top:20px;'><br><br>";

                    if ($ans == 0) {
                        $str .= "<li style='margin-left:70px;'><i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        </li>";
                    }

                    if ($ans == 1) {
                        $str .= "<li style='margin-left:70px;'>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i></li>";
                    }

                    if ($ans == 2) {
                        $str .= "<li style='margin-left:70px;'>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i></li>";
                    }
                    if ($ans == 3) {
                        $str .= "<li style='margin-left:70px;'><i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        </li>";
                    }

                    if ($ans == 4) {
                        $str .= "<li style='margin-left:70px;'><i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>                 
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>                  
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
                        </li>";
                    }

                    if ($ans == 5) {
                        $str .= "<li style='margin-left:70px;'><i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
                        </li>";
                    }


                    $str .= "</td><td style='color:black; border-top:3px solid black; padding:20px 140px 30px 100px;'><h3 class='page-title'><b>" . $row["fullname"] . "</b></h3><br><span style='font-size:18px; padding:0px; '>"."<b>Address : </b>" .$row["cname"]." . ". $row["caddress"] . "<br><b>Email : </b>" . $row["email"] .  "<br><b>Qualification : </b>" . $row["qualification"] .  "(". $row["experience"] . " Years ) " . "  </td></span><td style='text-align:center;border-top:3px solid black;'>";

                    if (isset($_SESSION["id"])) {
                        $str .= "<li style='font-size:22px; margin-top:50px;'><span style='font-size:13px; color:#009ed4;'>
                    Give Your Rate :</span><br>
                    <a href='trate.php?id=" . $row["did"] . "&uid=" . $uid . "&rt=1'><i class='fa fa-star-o'  aria-hidden='true'></i></a>
                    <a href='trate.php?id=" . $row["did"] . "&uid=" . $uid . "&rt=2'><i class='fa fa-star-o'  aria-hidden='true'></i></a>
                    <a href='trate.php?id=" . $row["did"] . "&uid=" . $uid . "&rt=3'><i class='fa fa-star-o' aria-hidden='true'></i></a>
                    <a href='trate.php?id=" . $row["did"] . "&uid=" . $uid . "&rt=4'><i class='fa fa-star-o'  aria-hidden='true'></i></a>
                    <a href='trate.php?id=" . $row["did"] . "&uid=" . $uid . "&rt=5'><i class='fa fa-star-o'  aria-hidden='true'></i></a>

                    </li>

                    <a href='dappoint.php?id=" . $did . "'>" . "
                    <button type='button' class='btn btn-primary btn-sm' style='padding:4px 5px; font-size:18px;  position:relative; right:20px; margin-top:40px; width:200px; height:45px;  background-color:#644b8e; border:none;'>Take Appointment</button></a>";
                    } else {
                        $str .= "<li style='font-size:22px; margin-top:50px;'>
                    </li>
                    <button type='submit' name='btnsub' class='btn btn-primary btn-sm' style='padding:4px 5px; font-size:18px;  position:relative; right:20px; margin-top:120px; width:200px; height:45px;  background-color:#644b8e; border:none;'>Take Appointment</button></a>";
                    }


                    $str .= "</td></tr>";
                }

                $str .= "</table>";
                echo $str;


                if (isset($_POST["btnsub"])) {
                    echo "<script type='text/javascript'>";
                    echo 'alert("You need to do login to Take Appointment");';
                    echo 'window.location="login.php?id=' . $did . '";';
                    echo "</script>";
                }


                ?>

            </div>
</div>
</section>
<?php
include_once("footer.php");
?>