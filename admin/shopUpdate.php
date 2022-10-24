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
            $qry = "Select * from shop where shid = $id";
            $result = $conn->query($qry);
            while ($row = $result->fetch_assoc()) {
              $id = $row["shid"];
              $name = $row["ownername"];
              $username = $row["uname"];
              $shopname = $row["sname"];
              $contact = $row["contactno"];
              $email = $row["email"];
              $address = $row["address"];
              $website = $row["website"];
            }
            if (isset($_POST["btnupdate"])) {
              $ownername = $_POST["txtname"];
              $username = $_POST["txtuname"];
              $shopname = $_POST["txtsname"];
              $contact = $_POST["txtcontact"];
              $email = $_POST["txtemail"];
              $address = $_POST["txtaddress"];
              $website = $_POST["txtwebsite"];
              $qryUpdate = "UPDATE shop SET ownername = '$ownername', uname = '$username', contactno = '$contact', email = '$email', address = '$address', sname = '$shopname', website = '$website' WHERE shid = $id";
              $resultUpdate = $conn->query($qryUpdate);
              if ($resultUpdate == TRUE) {
                header("location: shopView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: shopView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
              <div class="form-group">
                  <label for="txtname">Owner's Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $name ;?>">
                </div>
                <div class="form-group">
                  <label for="txtuname">Username</label>
                  <input type="text" class="form-control" name="txtuname" id="txtuname" value="<?php echo $username ;?>">
                </div>
                <div class="form-group">
                  <label for="txtcontact">Contact No</label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?php echo $contact ;?>">
                </div>
                <div class="form-group">
                  <label for="txtemail">Email</label>
                  <input type="text" class="form-control" name="txtemail" id="txtemail" value="<?php echo $email ;?>">
                </div>
                <div class="form-group">
                  <label for="txtwebsite">Website</label>
                  <input type="text" class="form-control" name="txtwebsite" id="txtwebsite" value="<?php echo $website ;?>">
                </div>
                <div class="form-group">
                  <label for="txtsname">Shop Name</label>
                  <input type="text" class="form-control" name="txtsname" id="txtsname" value="<?php echo $shopname ;?>">
                </div>
                <div class="form-group">
                  <label for="txtaddress">Address</label>
                  <input type="text" class="form-control" name="txtaddress" id="txtaddress" value="<?php echo $address ;?>">
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