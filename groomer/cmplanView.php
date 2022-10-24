<?php
ob_start();
include_once("header.php");
?>

<div class="content-wrapper">
  <!-- <section class="content"> -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary" style="font-size: 20px;">
            <?php
            $id = $_SESSION["id"];
            $conn = mysqli_connect("localhost", "root", "", "project");
            $qryApp = "Select * from appointment where gid = '$id'";
            $resultApp = $conn->query($qryApp);
            $appoint = mysqli_num_rows($resultApp);

            $qry = "Select mpid, fullname, mname, dop, mplimit, status from groomer, mplantype, mplan where mplan.mptid = mplantype.mptid and mplan.gid = groomer.gid and mplan.gid > 0 and mplan.gid = $id";
            $result = $conn->query($qry);
            $tbl = "<table class='table table-borderless'>";
            while ($row = $result->fetch_assoc()) {
              $mid = $row["mpid"];
              $name = $row["fullname"];
              $mname = $row["mname"];
              $mplimit = $row["mplimit"];
              $dop = $row["dop"];
              $status = $row["status"];
              $appointment = $mplimit - $appoint;
              $tbl .= "<td><b>Name :</b> $name <br> <b>Plan :</b> $mname <br> <b> Date of Plan :</b> $dop <br> <b>Appointments Left :</b> $appointment <br> <b>Status of Plan :</b> $status</td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btnback"])) {
              header("location: index.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <?php echo $tbl; ?>
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