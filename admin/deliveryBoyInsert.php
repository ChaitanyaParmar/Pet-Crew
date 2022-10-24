<?php
ob_start();
include_once("header.php");
?>
<div class="content-wrapper">
  <section class="content" style="margin-top: 20px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "project");
            if (isset($_POST["btninsert"])) {
              $uname = $_POST["txtname"];
              $ucontact = $_POST["txtcontact"];
              $uemail = $_POST["txtemail"];
              $uaddress = $_POST["txtaddress"];
              $qryInsert = "Insert into deliveryboy (fullname, contactno, email, address) values('$uname', '$ucontact','$uemail','$uaddress')";
              $result = $conn->query($qryInsert);
              if ($result == TRUE) {
                header("location: deliveryBoyView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: deliveryBoyView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtfname">Full Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter Full Name...">
                </div>
                <div class="form-group">
                  <label for="txtcontact">Contact No</label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact" placeholder="Enter Contact No...">
                </div>
                <div class="form-group">
                  <label for="txtemail">Email</label>
                  <input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                  <label for="txtaddress">Address</label>
                  <input type="text" class="form-control" name="txtaddress" id="txtaddress" placeholder="Enter Address...">
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" name="btninsert" value="Insert" class="btn btn-primary">
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>
<?php
include_once("footer.php");
?>