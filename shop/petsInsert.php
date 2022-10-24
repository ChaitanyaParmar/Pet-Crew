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
              $bid = $_POST["cmbbname"];
              $gender = $_POST["txtgender"];
              $age = $_POST["txtage"];
              $colour = $_POST["txtcolour"];
              $height = $_POST["txtheight"];
              $weight = $_POST["txtweight"];
              $temperament = $_POST["txttemper"];
              $price = $_POST["txtprice"];
              $details = $_POST["txtdetails"];
              $shid = $_POST["cmbsname"];
              $qryInsert = "Insert into pets (bid, gender, age, colour, height, weight, temperament, price, details, shid) values('$bid', '$gender', '$age', '$colour', '$height', '$weight', '$temperament', '$price', '$details', '$shid')";
              $result = $conn->query($qryInsert);
              if ($result == TRUE) {
                header("location: petsView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: petsView.php");
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="cmbbname">Breed Name</label>
                  <select name="cmbbname" id="cmbbname">
                    <?php 
                      $qryMeasure = "Select * from breed";
                      $resultMeasure = $conn->query($qryMeasure);
                      while($row = $resultMeasure->fetch_assoc()){
                        $bid = $row["bid"];
                        $bname = $row["bname"];
                        
                        echo "<option value='$bid'>$bname</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtgender">Gender</label>
                  <input type="text" class="form-control" name="txtgender" id="txtgender">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtage">Age</label>
                  <input type="text" class="form-control" name="txtage" id="txtage">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtcolour">Colour</label>
                  <input type="text" class="form-control" name="txtcolour" id="txtcolour">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtheight">Height</label>
                  <input type="text" class="form-control" name="txtheight" id="txtheight">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtweight">Weight</label>
                  <input type="text" class="form-control" name="txtweight" id="txtweight">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txttemper">Temperament</label>
                  <input type="text" class="form-control" name="txttemper" id="txttemper">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtprice">Price</label>
                  <input type="text" class="form-control" name="txtprice" id="txtprice">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtdetails">Details</label>
                  <input type="text" class="form-control" name="txtdetails" id="txtdetails">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="cmbsname">Shop Name</label>
                  <select name="cmbsname" id="cmbsname">
                    <?php 
                      $qryMeasure = "Select * from shop";
                      $resultMeasure = $conn->query($qryMeasure);
                      while($row = $resultMeasure->fetch_assoc()){
                        $shid = $row["shid"];
                        $sname = $row["sname"];
                        
                        echo "<option value='$shid'>$sname</option>";
                      }
                    ?>
                  </select>
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