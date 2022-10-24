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
              $pname = $_POST["txtpname"];
              $oprice = $_POST["txtoprice"];
              $aprice = $_POST["txtaprice"];
              $pvalue = $_POST["txtpvalue"];
              $qryUpdate = "UPDATE breed SET pname = '$pname', oprice = $oprice, aprice = '$aprice', pvalue = '$pvalue' WHERE pid = $id";
              $resultUpdate = $conn->query($qryUpdate);
              if ($resultUpdate == TRUE) {
                header("location: productView.php");
              } else {
                mysqli_close($conn);
              }
            }
            $qry = "Select pid, product.mid, pname, oprice, aprice, mname, pvalue, pcname, sname, dopost, product.img, rate from product, measurement_type, shop, pcategory where product.mid = measurement_type.mid and product.pcatid = pcategory.pcatid and product.shid = shop.shid and pid = $id";
            $result = $conn->query($qry);
            $row = $result->fetch_assoc();
             
              $id = $row["pid"];
              $pname = $row["pname"];
              $oprice = $row["oprice"];
              $aprice = $row["aprice"];
              $mname = $row["mname"];
              $pvalue = $row["pvalue"];
              $pcname = $row["pcname"];
              $sname = $row["sname"];
              $dopost = $row["dopost"];
              $img = $row["img"];
              $rate = $row["rate"];
              $mselectid=$row["mid"];
    

            if (isset($_POST["btnback"])) {
              header("location: productView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Product Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $pname; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Offer Price</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $oprice; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Actual Price</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $aprice; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Quantity</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $pvalue; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtmeasurement">Measurement</label>
                  <select name="cmbmeasurement" id="cmbmeasurement" value="<?php echo $mname;?>">
                  <?php 
                    $qryMeasure = "Select * from measurement_type";
                    $resultMeasure = $conn->query($qryMeasure);
                    while($row = $resultMeasure->fetch_assoc()){
                      $mid = $row["mid"];
                      $mname = $row["mname"];
                      // $mselectid=$row["mid"];
                      
                      if($mid==$mselectid)
                      {
                        echo "<option value='$mid' selected>$mname</option>";
                      }
                      else
                      {
                        echo "<option value='$mid'>$mname</option>";
                      }
                    }
                  ?>
                </select>
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