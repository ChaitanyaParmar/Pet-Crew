<style>
    /*th{*/
    /*    text-align: center;*/
    /*}*/
</style>
<?php include_once("header.php");

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}?>
<section class="slider_area" style="background-image:url(images/slider/4.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider">
                    <h2>APPOINTMENT HISTORY</h2>
                    <p><a href="home.php">Home </a><span>/</span><a href=""> Profile </a><span>/ Appointment History</span></p>
                </div>
            </div>
        </div>
    </div>
</section><br>
<div class="content-wrapper" style='padding-left: 100px; padding-right: 100px; color: black; text-align: center; align-items: center'>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "project");
    $qry = "Select aid, appointment.fullname, petname, bname, status, appdate, did, gid, tid from appointment, breed where appointment.bid = breed.bid and status = 3 and uid = '$id'";
    $result = $conn -> query($qry);
    $count = mysqli_num_rows($result);
    if($count > 0){
        $tbl = "<table class='table' style='font-size: 18px;text-align: center'><thead><tr><th style='text-align: center'>Professional's Name</th><th style='text-align: center'>Pet Name</th><th style='text-align: center'>Breed</th><th style='text-align: center'>Date of Appointment</th><th style='text-align: center'>Status</th><th></th></tr></thead>";
        while ($row = $result->fetch_assoc()) {
            $did = $row["did"];
            $tid = $row["tid"];
            $gid = $row["gid"];
            if($did != NULL){
                $qry1 = "Select * from doctor where did = $did";
            }
            else if($tid != NULL){
                $qry1 = "Select * from trainer where tid = $tid";
            }
            else if($gid != NULL){
                $qry1 = "Select * from groomer where gid = $gid";
            }
            $result1 = $conn -> query($qry1);
            $row1 = $result1->fetch_assoc();
            $proname = $row1["fullname"];
            $aid = $row['aid'];
//        $name = $row["fullname"];
            $pname = $row["petname"];
            $bname = $row["bname"];
            $date = $row["appdate"];
            $status = $row["status"];

            if($status == 0){
                $status = 'Pending';
            }
            else if($status == 1){
                $status = 'Accepted';
            }
            else if($status == 2){
                $status = 'Declined';
            }
            else{
                $status = 'Done';
            }

            $tbl .= "<tbody><tr><td>$proname</td><td>$pname</td><td>$bname</td><td>$date</td><td>$status</td></tr></tbody>";
        }
        $tbl .= "</table><!-- /.content --></div>";
        echo "<br>" . $tbl;
    }
    else{
        echo "<h2 style='text-align : center; padding-top: 20px;'>No Appointments Today !!</h2>";
    }
    ?>

<?php include_once("footer.php"); ?>