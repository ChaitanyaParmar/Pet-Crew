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
            $conn = mysqli_connect("localhost", "root", "", "pet");
            $qry = "Select * from mplantype where mptid = $id";
            $result = $conn->query($qry);
            while ($row = $result->fetch_assoc()) {
              $id = $row["mptid"];
              $name = $row["mname"];
              $price = $row["mpprice"];
              $limit = $row["mplimit"];
            }
            if (isset($_POST["btnupdate"])) {
              $name = $_POST["txtname"];
              $price = $_POST["txtprice"];
              $limit = $_POST["txtlimit"];
              $qryUpdate = "UPDATE mplantype SET mname = '$name', mpprice = $price, mplimit = $limit WHERE mptid = $id";
              $resultUpdate = $conn->query($qryUpdate);
              if ($resultUpdate == TRUE) {
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
                  <label for="txtname">Plan Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                  <label for="txtprice">Price</label>
                  <input type="text" class="form-control" name="txtprice" id="txtprice" value="<?php echo $price; ?>">
                </div>
                <div class="form-group">
                  <label for="txtlimit">Limit</label>
                  <input type="text" class="form-control" name="txtlimit" id="txtlimit" value="<?php echo $limit; ?>">
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