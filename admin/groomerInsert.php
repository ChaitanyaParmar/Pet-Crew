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
              $name = $_POST["txtname"];
              $username = $_POST["txtuname"];
              $contact = $_POST["txtcontact"];
              $gender = $_POST["txtgender"];
              $email = $_POST["txtemail"];
              $password = $_POST["txtpass"];
              $pass = md5($password);
              $shop = $_POST["txtshop"];
              $address = $_POST["txtaddress"];
              $role = $_POST["txtrole"];
              $qryInsert = "Insert into groomer (fullname, uname, contactno, gender, email, pwd, address, shopname, role, doj) values('$name', '$username', '$contact', '$gender', '$email', '$pass', '$address', '$shop', '$role', now())";

              $result = $conn->query($qryInsert);
              if ($result == TRUE) {
                header("location: groomerView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: groomerView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Full Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter Name...">
                </div>
                <div class="form-group">
                  <label for="txtuname">Username</label>
                  <input type="text" class="form-control" name="txtuname" id="txtuname" placeholder="Enter Username...">
                </div>
                <div class="form-group">
                  <label for="txtcontact">Contact No</label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact" placeholder="Enter Contact No...">
                </div>
                <div class="form-group">
                  <label for="txtgender">Gender</label>
                  <input type="text" class="form-control" name="txtgender" id="txtgender" placeholder="Enter Gender...">
                </div>
                <div class="form-group">
                  <label for="txtemail">Email</label>
                  <input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                  <label for="txtpass">Password</label>
                  <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Enter Password...">
                </div>
                <div class="form-group">
                  <label for="txtshop">Shop Name</label>
                  <input type="text" class="form-control" name="txtshop" id="txtshop" placeholder="Enter Shop...">
                </div>
                <div class="form-group">
                  <label for="txtaddress">Address</label>
                  <input type="text" class="form-control" name="txtaddress" id="txtaddress" placeholder="Enter Address...">
                </div>
                <div class="form-group">
                  <input type="hidden" name="txtrole" value="4">
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