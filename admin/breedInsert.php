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
              $qryInsert = "Insert into breed (bname) values('$name')";
              $result = $conn->query($qryInsert);
              if ($result == TRUE) {
                header("location: breedView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: breedView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Breed Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter Breed Name...">
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