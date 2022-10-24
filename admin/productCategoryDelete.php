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
            $tbl = "<table class='table table-borderless'>";
            while ($row = $result->fetch_assoc()) {
              $id = $row["pcatid"];
              $name = $row["pcname"];
              $tbl .= "<td> <b>Category Name :</b> $name </td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btndelete"])) {
              $qryDelete = "Delete from pcategory where pcatid = $id";
              $resultDelete = $conn->query($qryDelete);
              if ($resultDelete == TRUE) {
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
                <?php echo $tbl; ?>
              </div>
              <div class="card-footer">
                <input type="submit" name="btndelete" value="Delete" class="btn btn-primary">
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

<?php include_once("footer.php"); ?>