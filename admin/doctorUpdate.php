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
            $qry = "Select * from doctor where did = $id";
            $result = $conn->query($qry);
            while ($row = $result->fetch_assoc()) {
              $id = $row["did"];
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
            }
            if (isset($_POST["btnupdate"])) {
              $name = $_POST["txtname"];
              $username = $_POST["txtuname"];
              $contact = $_POST["txtcontact"];
              $gender = $_POST["txtgender"];
              $email = $_POST["txtemail"];
              // $password = $_POST["txtpass"];
              $occupation = $_POST["txtoccupation"];
              $qualification = $_POST["txtqualification"];
              $experience = $_POST["txtexperience"];
              $gvc_no = $_POST["txtgvcno"];
              $clinicname = $_POST["txtcname"];
              $clinicaddress = $_POST["txtcaddress"];
              $qryUpdate = "UPDATE doctor SET fullname = '$name', uname = '$username', contactno = '$contact', gender = '$gender', email = '$email', occupation = '$occupation', qualification = '$qualification', experience = $experience, gvc_no = $gvc_no, cname = '$clinicname', caddress = '$clinicaddress' WHERE did = $id";
              $resultUpdate = $conn->query($qryUpdate);
              if ($resultUpdate == TRUE) {
                header("location: doctorView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: doctorView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Name</label>
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
                <!-- <div class="form-group">
                  <label for="txtpass">Password</label>
                  <input type="text" class="form-control" name="txtpass" id="txtpass" value="<?php echo $pwd; ?>">
                </div> -->
                <div class="form-group">
                  <label for="txtoccupation">Occupation</label>
                  <input type="text" class="form-control" name="txtoccupation" id="txtoccupation" value="<?php echo $occupation; ?>">
                </div>
                <div class="form-group">
                  <label for="txtqualification">Qualification</label>
                  <input type="text" class="form-control" name="txtqualification" id="txtqualification" value="<?php echo $qualification; ?>">
                </div>
                <div class="form-group">
                  <label for="txtexperience">Experience</label>
                  <input type="text" class="form-control" name="txtexperience" id="txtexperience" value="<?php echo $experience; ?>">
                </div>
                <div class="form-group">
                  <label for="txtgvcno">GVC No</label>
                  <input type="text" class="form-control" name="txtgvcno" id="txtgvcno" value="<?php echo $gvc_no; ?>">
                </div>
                <div class="form-group">
                  <label for="txtcname">Clinic Name</label>
                  <input type="text" class="form-control" name="txtcname" id="txtcname" value="<?php echo $cname; ?>">
                </div>
                <div class="form-group">
                  <label for="txtcaddress">Clinic Address</label>
                  <input type="text" class="form-control" name="txtcaddress" id="txtcaddress" value="<?php echo $caddress; ?>">
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