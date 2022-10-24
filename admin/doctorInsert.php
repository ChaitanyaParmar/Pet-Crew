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
              $occupation = $_POST["txtoccupation"];
              $qualification = $_POST["txtqualification"];
              $experience = $_POST["txtexperience"];
              $gvc_no = $_POST["txtgvcno"];
              $clinicname = $_POST["txtcname"];
              $clinicaddress = $_POST["txtcaddress"];
              $role = $_POST["txtrole"];
              $qryInsert = "Insert into doctor (fullname, uname, contactno, gender, email, pwd, occupation, qualification, experience, gvc_no, cname, caddress, role, doj) values('$name', '$username', '$contact', '$gender', '$email', '$pass', '$occupation', '$qualification', $experience, $gvc_no, '$clinicname', '$clinicaddress', '$role', now())";
              
              $result = $conn->query($qryInsert);
              if ($result == TRUE) {
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
                  <label for="txtoccupation">Occupation</label>
                  <input type="text" class="form-control" name="txtoccupation" id="txtoccupation" placeholder="Enter Occupation...">
                </div>
                <div class="form-group">
                  <label for="txtqualification">Qualification</label>
                  <input type="text" class="form-control" name="txtqualification" id="txtqualification" placeholder="Enter Qualification...">
                </div>
                <div class="form-group">
                  <label for="txtexperience">Experience (In Years)</label>
                  <input type="text" class="form-control" name="txtexperience" id="txtexperience" placeholder="Enter Experience...">
                </div>
                <div class="form-group">
                  <label for="txtgvcno">GVC No</label>
                  <input type="text" class="form-control" name="txtgvcno" id="txtgvcno" placeholder="Enter GVC No...">
                </div>
                <div class="form-group">
                  <label for="txtcname">Clinic Name</label>
                  <input type="text" class="form-control" name="txtcname" id="txtcname" placeholder="Enter Clinic Name...">
                </div>
                <div class="form-group">
                  <label for="txtcaddress">Clinic Address</label>
                  <input type="text" class="form-control" name="txtcaddress" id="txtcaddress" placeholder="Enter Clinic Address...">
                </div>
                <div class="form-group">
                  <input type="hidden" name="txtrole" value="2">
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