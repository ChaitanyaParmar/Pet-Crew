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
            
            if (isset($_POST["btnupdate"])) {
              $bname = $_POST["txtbname"];
              $gender = $_POST["txtgender"];
              $age = $_POST["txtage"];
              $colour = $_POST["txtcolour"];
              $height = $_POST["txtheight"];
              $weight = $_POST["txtweight"];
              $temperament = $_POST["txttemper"];
              $price = $_POST["txtprice"];
              $details = $_POST["txtdetails"];
              $sname = $_POST["txtsname"];
              $qryUpdate = "UPDATE breed SET bname = '$bname', gender = $gender, age = '$age', colour = '$colour', height = '$height', weight = '$weight', temperament = '$temperament', price = '$price', details = '$details', sname = '$sname' WHERE petsid = $id";
              $resultUpdate = $conn->query($qryUpdate);
              if ($resultUpdate == TRUE) {
                header("location: petsView.php");
              } else {
                mysqli_close($conn);
              }
            }
            $qry = "Select petsid, breed.bid, bname, gender, age, colour, height, weight, temperament, price, details, sname, pets.img from pets, breed, shop where pets.bid = breed.bid and pets.shid = shop.shid and petsid = $id";
            $result = $conn->query($qry);
            $row = $result->fetch_assoc();
            $id = $row["petsid"];
            $bname = $row["bname"];
            $gender = $row["gender"];
            $age = $row["age"];
            $colour = $row["colour"];
            $height = $row["height"];
            $weight = $row["weight"];
            $temperament = $row["temperament"];
            $price = $row["price"];
            $details = $row["details"];
            $sname = $row["sname"];
            $img = $row["img"];
    
            if (isset($_POST["btnback"])) {
              header("location: petsView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtbname">Breed Name</label>
                  <input type="text" class="form-control" name="txtbname" id="txtbname" value="<?php echo $bname; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtgender">Gender</label>
                  <input type="text" class="form-control" name="txtgender" id="txtgender" value="<?php echo $gender; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtage">Age</label>
                  <input type="text" class="form-control" name="txtage" id="txtage" value="<?php echo $age; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtcolour">Colour</label>
                  <input type="text" class="form-control" name="txtcolour" id="txtcolour" value="<?php echo $colour; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtheight">Height</label>
                  <input type="text" class="form-control" name="txtheight" id="txtheight" value="<?php echo $height . ' cm'; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtweight">Weight</label>
                  <input type="text" class="form-control" name="txtweight" id="txtweight" value="<?php echo $weight . ' kg'; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtweight">Weight</label>
                  <input type="text" class="form-control" name="txtweight" id="txtweight" value="<?php echo $weight . ' kg'; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txttemper">Temperament</label>
                  <input type="text" class="form-control" name="txttemper" id="txttemper" value="<?php echo $temperament; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtdetails">Details</label>
                  <input type="text" class="form-control" name="txtdetails" id="txtdetails" value="<?php echo $details; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtsname">Shop Name</label>
                  <input type="text" class="form-control" name="txtsname" id="txtsname" value="<?php echo $sname; ?>">
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