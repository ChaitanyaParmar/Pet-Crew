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
            $conn = mysqli_connect("localhost", "root", "", "pet");
            if (isset($_POST["btninsert"])) {
              $name = $_POST["txtname"];
              $price = $_POST["txtprice"];
              $limit = $_POST["txtlimit"];
              $qryInsert = "Insert into mplantype (mname, mpprice, mplimit) values('$name', '$price', '$limit')";
              
              $result = $conn->query($qryInsert);
              if ($result == TRUE) {
                header("location: membershipPlanTypeView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: membershipPlanTypeView.php");
            }
            ?>
            <form method="POST">
            <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter Name...">
                </div>
                <div class="form-group">
                  <label for="txtprice">Price</label>
                  <input type="text" class="form-control" name="txtprice" id="txtprice" placeholder="Enter Price...">
                </div>
                <div class="form-group">
                  <label for="txtlimit">Limit</label>
                  <input type="text" class="form-control" name="txtlimit" id="txtlimit" placeholder="Enter Limit...">
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