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
            $qry = "Select * from pcategory where pcatid = $id";
            $result = $conn->query($qry);
            while ($row = $result->fetch_assoc()) {
              $id = $row["pcatid"];
              $name = $row["pcname"];
            }
            if (isset($_POST["btnupdate"])) {
              $name = $_POST["txtname"];
              $qryUpdate = "UPDATE pcategory SET pcname = '$name' WHERE pcatid = $id";
              $resultUpdate = $conn->query($qryUpdate);
              if ($resultUpdate == TRUE) {
                header("location: productCategoryView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: productCategoryView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Category Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $name; ?>">
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