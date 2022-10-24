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
            $qry = "Select * from deliveryboy where dbid = $id";
            $result = $conn -> query($qry);
            while($row=$result->fetch_assoc()){
                $id = $row["dbid"];
                $name = $row["fullname"];
                $contact = $row["contactno"];
                $email = $row["email"];
                $address = $row["address"];
            }
            if (isset($_POST["btnupdate"])) {
                $uname = $_POST["txtname"];
                $ucontact = $_POST["txtcontact"];
                $uemail = $_POST["txtemail"];
                $uaddress = $_POST["txtaddress"];
                $qryUpdate = "UPDATE deliveryboy SET fullname = '$uname', contactno = '$ucontact', email = '$uemail', address = '$uaddress' WHERE dbid = $id";
                $resultUpdate = $conn -> query($qryUpdate);
                if($resultUpdate == TRUE){
                    header("location: deliveryBoyView.php");
                }
                else{
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
                  <label for="txtfname">First Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtfname" value="<?php echo $name;?>">
                </div>
                <div class="form-group">
                  <label for="txtcontact">Contact No</label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?php echo $contact;?>">
                </div>
                <div class="form-group">
                  <label for="txtemail">Email</label>
                  <input type="text" class="form-control" name="txtemail" id="txtemail" value="<?php echo $email;?>">
                </div>
                <div class="form-group">
                  <label for="txtaddress">Address</label>
                  <input type="text" class="form-control" name="txtaddress" id="txtaddress" value="<?php echo $address;?>">
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