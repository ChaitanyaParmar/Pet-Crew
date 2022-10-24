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
            $qry = "Select * from doctor where did = $id";
            $result = $conn->query($qry);
            $tbl = "<table class='table table-borderless'>";
            while ($row = $result->fetch_assoc()) {
              $did = $row["did"];
              $name = $row["fullname"];
              $username = $row["uname"];
              $contact = $row["contactno"];
              $gender = $row["gender"];
              $email = $row["email"];
              // $pwd = $row["pwd"];
              $occupation = $row["occupation"];
              $qualification = $row["qualification"];
              $experience = $row["experience"];
              $gvc_no = $row["gvc_no"];
              $cname = $row["cname"];
              $caddress = $row["caddress"];

              $contactno = strlen($contact);
              if($contactno == 8){
                $contact = "(079) " . $contact;
              }
              else if($contactno == 10){
                $contact = "(+91) " . $contact;
              }

              $tbl .= "<td><b>Name :</b> $name <br> <b>Username :</b> $username <br> <b>Contact No :</b> $contact <br> <b>Gender :</b> $gender <br> <b>Email:</b> $email <br> <b>Occupation :</b> $occupation <br> <b>Qualification:</b> $qualification <br> <b>Experience :</b> $experience Years <br> <b>GVC No :</b> $gvc_no <br> <b>Clinic Name :</b> $cname <br> <b>Clinic Address:</b> $caddress</td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btndisable"])) {
              header("location: doctorDisable.php?id=$id");
            }
            if (isset($_POST["btnenable"])) {
              header("location: doctorEnable.php?id=$id");
            }
            if (isset($_POST["btnupdate"])) {
              header("location: doctorUpdate.php?id=$did");
            }
            if (isset($_POST["btnback"])) {
              header("location: doctorView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <?php echo $tbl; ?>
                <br>
                <input style="color: white;" type='submit' name='btndisable' value='Disable' class='btn btn-warning'>
                <input type="submit" name="btnenable" value="Enable" class="btn btn-success">
                <input type='submit' name='btnupdate' value='Update' class='btn btn-primary'>
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
  <!-- </section> -->
</div>

<?php include_once("footer.php"); ?>