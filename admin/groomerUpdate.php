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
            $id = $_REQUEST["id"];
            $conn = mysqli_connect("localhost", "root", "", "project");
            $qry = "Select * from groomer where gid = $id";
            $result = $conn->query($qry);
            while ($row = $result->fetch_assoc()) {
              $id = $row["gid"];
              $name = $row["fullname"];
              $username = $row["uname"];
              $contact = $row["contactno"];
              $gender = $row["gender"];
              $email = $row["email"];
              $address = $row["address"];
              $shop = $row["shopname"];
            }
            if (isset($_POST["btnupdate"])) {
              $name = $_POST["txtname"];
              $username = $_POST["txtuname"];
              $contact = $_POST["txtcontact"];
              $gender = $_POST["txtgender"];
              $email = $_POST["txtemail"];
              $address = $_POST["txtaddress"];
              $shop = $_POST["txtshop"];
              $qryUpdate = "UPDATE groomer SET fullname = '$name', uname = '$username', contactno = '$contact', gender = '$gender', email = '$email', shopname = '$shop', address = '$address' WHERE gid = $id";
              $resultUpdate = $conn->query($qryUpdate);
              if ($resultUpdate == TRUE) {
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
                  <label for="txtname">First Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                  <label for="txtuname">Username</label>
                  <input type="text" class="form-control" name="txtuname" id="txtuname" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                  <label for="txtcontact">Contact No</label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?php echo $contact; ?>">
                </div>
                <div class="form-group">
                  <label for="txtgender">Gender</label>
                  <input type="text" class="form-control" name="txtgender" id="txtgender" value="<?php echo $gender; ?>">
                </div>
                <div class="form-group">
                  <label for="txtemail">Email</label>
                  <input type="text" class="form-control" name="txtemail" id="txtemail" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                  <label for="txtshop">Shop Name</label>
                  <input type="text" class="form-control" name="txtshop" id="txtshop" value="<?php echo $shop; ?>">
                </div>
                <div class="form-group">
                  <label for="txtaddress">Address</label>
                  <input type="text" class="form-control" name="txtaddress" id="txtaddress" value="<?php echo $address; ?>">
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" name="btnupdate" value="Update" class="btn btn-primary">
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

<?php include_once("footer.php"); ?>