<?php include_once("header.php"); ?>

  <div class="content-wrapper">
    <?php
      $conn = mysqli_connect("localhost", "root", "", "project");
      $qry = "Select pid, pcategory.pcatid, pname, oprice, aprice, mname, pvalue, pcname, sname, dopost, product.img, rate from product, measurement_type, shop, pcategory where product.mid = measurement_type.mid and product.pcatid = pcategory.pcatid and product.shid = shop.shid";
      $result = $conn -> query($qry);
      $tbl = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 84vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Name</th><th>Offer Price</th><th>Actual Price</th><th>Qty</th><th>Measurement</th><th>Product Category</th><th>Shop Name</th><th>Date of Post</th><th>Image</th><th>Rating</th><th></th><th></th></tr></thead>";
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
        $tbl .= "<tbody><tr><td>$pname</td><td>$oprice</td><td>$aprice</td><td>$pvalue</td><td>$mname</td><td>$pcname</td><td>$sname</td><td>$dopost</td><td>$img</td><td>$rate</td><td><a href='productUpdate.php?id=$id'><input type='submit' class='update' name='update'value='Update'></a></td><td><a href='productDelete.php?id=$id'><input type='submit' class='delete' name='delete' value='Delete'></a></td></tr></tbody>";
      }
      $tbl .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></section><!-- /.content --></div>";
      echo "<br>" . $tbl;
    ?>                  
<?php include_once("footer.php"); ?>