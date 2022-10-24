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
            $qry1 = "Select * from product";
            $result = $conn -> query($qry1);
            $row = $result -> fetch_assoc();
            $pid = $row["pid"];
            if (isset($_POST["btninsert"])) {
              $pname = $_POST["txtpname"];
              $oprice = $_POST["txtoprice"];
              $aprice = $_POST["txtaprice"];
              $mid = $_POST["cmbmeasurement"];
              $qty = $_POST["txtquantity"];
              $pcid = $_POST["cmbpcategory"];
              $shid = $_POST["cmbshop"];
              // $img = $_POST["file"];

              if ($_FILES['file']['name'] != "") {
                $file = $_FILES['file'];
          
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
          
                // Gets file extension
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
          
                $allow = array('png', 'jpg', 'jpeg');
          
                if (in_array($fileActualExt, $allow)) {
                  if ($fileError == 0) {
                    if ($fileSize < 500000) {
                      $fileNameNew = $pid . "." . $fileActualExt;
                      $fileDestination = "images/products/" . $fileNameNew;
                      move_uploaded_file($fileTmpName, $fileDestination);
                      echo "<script>alert('Upload Successful !!');</script>";
                    } else {
                      $error = "Your file is too Big!!!";
                    }
                  } else {
                    $error = "There was an error uploading your file!!!";
                  }
                } else {
                  $error = "You cannot upload files of this type!!!";
                }
          
                $qry = "Insert into product (pname, oprice, aprice, mid, pvalue, pcatid, shid, img, dopost) values('$pname', '$oprice', '$aprice', '$mid', '$qty', '$pcid', '$shid', '$fileNameNew', now())";
                $result = $conn->query($qry);
                $yourURL = "productView.php";
                echo ("<script>location.href='$yourURL'</script>");
              } else {
                $qry = "Insert into product (pname, oprice, aprice, mid, pvalue, pcatid, shid, img, dopost) values('$pname', '$oprice', '$aprice', '$mid', '$qty', '$pcid', '$shid', now())";
                $result = $conn->query($qry);
                if ($result) {
                  echo "<script>location.href='productView.php';</script>";
                } else {
                  echo "<script>alert('Product Not Added Successfully)</script>";
                }
              }

              // $qryInsert = "Insert into product (pname, oprice, aprice, mid, pvalue, pcatid, shid, img) values('$pname', '$oprice', '$aprice', '$mid', '$qty', '$pcid', '$shid', $img)";
              // $result = $conn->query($qryInsert);
              // if ($result == TRUE) {
              //   header("location: productView.php");
              // } else {
              //   mysqli_close($conn);
              // }
            }
            if (isset($_POST["btnback"])) {
              header("location: productView.php");
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtpname">Product Name</label>
                  <input type="text" class="form-control" name="txtpname" id="txtpname" placeholder="Enter Product Name...">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtoprice">Offer Price</label>
                  <input type="text" class="form-control" name="txtoprice" id="txtoprice" placeholder="Enter Offer Price...">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtaprice">Actual Price</label>
                  <input type="text" class="form-control" name="txtaprice" id="txtaprice" placeholder="Enter Actual Price...">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="txtquantity">Quantity</label>
                  <input type="text" class="form-control" name="txtquantity" id="txtquantity" placeholder="Enter Quantity...">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="cmbMeasurement">Measurement</label>
                  <select name="cmbmeasurement" id="cmbmeasurement">
                  <?php 
                    $qryMeasure = "Select * from measurement_type";
                    $resultMeasure = $conn->query($qryMeasure);
                    while($row = $resultMeasure->fetch_assoc()){
                      $mid = $row["mid"];
                      $mname = $row["mname"];
                      
                      echo "<option value='$mid'>$mname</option>";
                    }
                  ?>
                </select>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="cmbshop">Shop</label>
                  <select name="cmbshop" id="cmbshop">
                  <?php 
                    $qryShop = "Select * from shop";
                    $resultShop = $conn->query($qryShop);
                    while($row = $resultShop->fetch_assoc()){
                      $shid = $row["shid"];
                      $sname = $row["sname"];
                      
                      echo "<option value='$shid'>$sname</option>";
                    }
                  ?>
                </select>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="cmbpcategory">Product Category</label>
                  <select name="cmbpcategory" id="cmbpcategory">
                  <?php 
                    $qrypcat = "Select * from pcategory";
                    $resultpcat = $conn->query($qrypcat);
                    while($row = $resultpcat->fetch_assoc()){
                      $pcid = $row["pcatid"];
                      $pcname = $row["pcname"];
                      
                      echo "<option value='$pcid'>$pcname</option>";
                    }
                  ?>
                </select>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="file">Image</label>
                  <input type="file" name="file" id="file">
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