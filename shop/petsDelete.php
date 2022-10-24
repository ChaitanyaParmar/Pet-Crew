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
            $qry = "Select petsid, breed.bid, bname, gender, age, colour, height, weight, temperament, price, details, sname, pets.img from pets, breed, shop where pets.bid = breed.bid and pets.shid = shop.shid and petsid = $id";
            $result = $conn->query($qry);
            $tbl = "<table class='table table-borderless'>";
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
              $tbl .= "<td><b>Breed Name :</b> $bname <br> <b>Gender :</b> $gender <br> <b>Age :</b> $age <br> <b>Colour :</b> $colour <br> <b>Height :</b> $height cm <br> <b>Weight :</b> $weight kg <br> <b>Temperament :</b> $temperament <br> <b>Price :</b> $price <br> <b>Details :</b> $details <br> <b>Shop Name :</b> $sname</td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btndelete"])) {
              $qryDelete = "Delete from pets WHERE petsid = $id";
              $resultDelete = $conn->query($qryDelete);
              if ($resultDelete == TRUE) {
                header("location: petsView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: petsView.php");
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