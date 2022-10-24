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
          $qry = "Select * from shop where shid = $id";
          $result = $conn->query($qry);
          $tbl = "<table class='table table-borderless'>";
          while ($row = $result->fetch_assoc()) {
            $id = $row["shid"];
            $name = $row["ownername"];
            $username = $row["uname"];
            $shopname = $row["sname"];
            $contact = $row["contactno"];
            $email = $row["email"];
            $address = $row["address"];
            $website = $row["website"];

            $contactno = strlen($contact);
            if ($contactno == 8) {
              $contact = "(079) " . $contact;
            } else if ($contactno == 10) {
              $contact = "(+91) " . $contact;
            }

            $tbl .= "<td><b>Owner's Name :</b> $name <br> <b>Username :</b> $username <br> <b>Contact No :</b> $contact <br> <b>Email:</b> $email <br> <b>Shop Name:</b> $shopname <br> <b>Address:</b> $address <br> <b>Website:</b> <a href='$website' style='color:black;'>$website</a></td>";
          }
          $tbl .= "</table>";
          if (isset($_POST["btnupdate"])) {
            header("location: shopUpdate.php?id=$id");
          }
          if (isset($_POST["btnback"])) {
            header("location: shopView.php");
          }
          ?>
          <form method="POST">
            <div class="card-body">
              <?php echo $tbl; ?>
              <br>
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