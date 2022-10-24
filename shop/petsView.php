<?php include_once("header.php"); ?>

  <div class="content-wrapper">
    <?php
      $conn = mysqli_connect("localhost", "root", "", "project");
      $qry = "Select petsid, breed.bid, bname, gender, age, colour, height, weight, temperament, price, details, sname, pets.img from pets, breed, shop where pets.bid = breed.bid and pets.shid = shop.shid";
      $result = $conn -> query($qry);
      $tbl = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 84vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Breed Name</th><th>Gender</th><th>Age</th><th>Colour</th><th>Height</th><th>Weight</th><th>Temperament</th><th>Price</th><th>Details</th><th>Shop Name</th><th>Image</th><th></th><th></th></tr></thead>";
      while ($row = $result->fetch_assoc()) {
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
        $tbl .= "<tbody><tr><td>$bname</td><td>$gender</td><td>$age</td><td>$colour</td><td>$height</td><td>$weight</td><td>$temperament</td><td>$price</td><td>$details</td><td>$sname</td><td>$img</td><td><a href='petsUpdate.php?id=$id'><input type='submit' class='update' name='update'value='Update'></a></td><td><a href='petsDelete.php?id=$id'><input type='submit' class='delete' name='delete' value='Delete'></a></td></tr></tbody>";
      }
      $tbl .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></section><!-- /.content --></div>";
      echo "<br>" . $tbl;
    ?>                  
<?php include_once("footer.php"); ?>