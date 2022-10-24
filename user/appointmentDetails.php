<?php
ob_start();
include_once("header.php");
?>
    <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider">
                        <h2>APPOINTMENT HISTORY</h2>
                        <p><a href="home.php">Home </a><span>/</span><a href="">
                                Profile </a><span>/ Appointment History</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <div class="content-wrapper" style="font-size: 20px;">
        <?php
        $id = $_REQUEST["id"];
        //                    $aid = $_REQUEST["aid"];
        $conn = mysqli_connect("localhost", "root", "", "project");
        $qry = "Select fullname, contactno, age, petname, bname, appdate, details from appointment, breed where appointment.bid = breed.bid and aid = $id";
        $result = $conn->query($qry);
        $tbl = "<table style='text-align: center'>";
        while ($row = $result->fetch_assoc()) {
            $name = $row["fullname"];
            $contact = $row["contactno"];
            $age = $row["age"];
            $breed = $row["bname"];
            $petname = $row["petname"];
            $date = $row["appdate"];
            $cmt = $row["details"];

            $contactno = strlen($contact);
            if ($contactno == 8) {
                $contact = "(079) " . $contact;
            } else if ($contactno == 10) {
                $contact = "(+91) " . $contact;
            }

            $tbl .= "<tr><td><b>Name :</b> $name <br> <b>Contact No :</b> $contact <br> <b>Name of Pet : </b> $petname <br>  <b>Breed : </b> $breed <br> <b>Age of Pet : </b> $age <br> <b>Appointment Date :</b> $date <br> <b>Comment:</b> $cmt </td></tr>";
        }
        $tbl .= "</table>";
        if (isset($_POST["btnback"])) {
            header("location: history.php");
        }
        ?>
        <form method="POST">
            <div class="container" style="text-align: center; align-items: center">
                <center><?php echo $tbl; ?></center>
                <br>
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
            </div>
        </form>
    </div>
    </div>
    </div>
    <!-- </section> -->
    </div>

<?php include_once("footer.php"); ?>