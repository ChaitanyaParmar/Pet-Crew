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
            $id = $_REQUEST["id"];
            $conn = mysqli_connect("localhost", "root", "", "project");
            $qry = "Select name, contact, petage, pname, bname, adatetime, cmt from appointment, breed where appointment.bid = breed.bid and did = $id";
            $result = $conn->query($qry);
            $tbl = "<table class='table table-borderless'>";
            while ($row = $result->fetch_assoc()) {
              $name = $row["name"];
              $contact = $row["contact"];
              $age = $row["petage"];
              $breed = $row["bname"];
              $petname = $row["pname"];
              $date = $row["adatetime"];
              $cmt = $row["cmt"];

              $contactno = strlen($contact);
              if($contactno == 8){
                $contact = "(079) " . $contact;
              }
              else if($contactno == 10){
                $contact = "(+91) " . $contact;
              }

              $tbl .= "<td><b>Name :</b> $name <br> <b>Contact No :</b> $contact <br> <b>Name of Pet : </b> $petname <br>  <b>Breed : </b> $breed <br> <b>Age of Pet : </b> $age <br> <b>Appointment Date :</b> $date <br> <b>Comment:</b> $cmt </td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btnback"])) {
              header("location: scheduledAppView.php");
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