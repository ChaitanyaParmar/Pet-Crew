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
            $qry = "Select pid, pname, oprice, aprice, mname, pvalue, pcname, sname, dopost, product.img, rate from product, measurement_type, shop, pcategory where product.mid = measurement_type.mid and product.pcatid = pcategory.pcatid and product.shid = shop.shid and pid = $id";
            $result = $conn->query($qry);
            $tbl = "<table class='table table-borderless'>";
            while ($row = $result->fetch_assoc()) {
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
              $qty = $pvalue . " " .$mname;
              $tbl .= "<td><b>Name :</b> $pname <br> <b>Offer Price :</b> $oprice <br> <b>Actual Price :</b> $oprice <br> <b>Quantity :</b> $qty <br> <b>Shop Name :</b> $sname <br> <b>Rating :</b> $rate</td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btndelete"])) {
              $qryDelete = "Delete from product WHERE pid = $id";
              $resultDelete = $conn->query($qryDelete);
              if ($resultDelete == TRUE) {
                header("location: productView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: productView.php");
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